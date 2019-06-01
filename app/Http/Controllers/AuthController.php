<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    public function register(Request $request)
    {
        $this->validate($request, [
            'FirstName' => 'required',
            'LastName' => 'required',
            'MobileNumber' => 'size:11|starts_with:09',
            'EmailAddress' => 'required|email|unique:users,EmailAddress',
            'Password' => 'required|min:8',
            'IsTeaching' => 'required|boolean',
            'YearGraduated' => 'required|size:4'
        ]);

        $user = User::create([
            'FirstName'    => $request->FirstName,
            'LastName' => $request->LastName,
            'MobileNumber' => $request->MobileNumber,
            'EmailAddress' => $request->EmailAddress,
            'Password' => Hash::make($request->Password),
            'IsTeaching' => $request->IsTeaching,
            'YearGraduated' => $request->YearGraduated,
        ]);

        $token = $this->generate_token($user);

        return $this->respondWithToken($token);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'EmailAddress' => 'required|email',
            'Password' => 'required',
        ]);

        $user = User::where('EmailAddress', $request->EmailAddress)->first();

        if ($user) {
            if (password_verify($request->Password, $user->Password)) {
                if ($token = $this->generate_token($user)) {
                    return $this->respondWithToken($token);
                }
            } 
        } 

        return response()->json(['message' => 'Email Address or Password is invalid'], 401);
    }

    /**
     * Logout User
     */
    public function logout()
    {
        $this->guard()->logout();
        return response()->json([
            'message' => 'Logged out Successfully.'
        ], 200);
    }

    /**
     * Refresh JWT token
     */
    public function refresh()
    {
        if ($token = $this->guard()->refresh()) {
            return response()
                ->json(['status' => 'successs'], 200)
                ->header('Authorization', $token);
        }
        return response()->json(['error' => 'refresh_token_error'], 401);
    }

    private function respondWithToken($token)
    {
        if ($this->guard()->check()) {
            $authenticatedUser = User::with('roles.role:ID,AccessType')->findOrFail($this->guard()->id());

            return response()->json([
                'user_info' => [
                    'ID' => $authenticatedUser->ID,
                    'FirstName' => $authenticatedUser->FirstName,
                    'LastName' => $authenticatedUser->LastName,
                    'EmailAddress' => $authenticatedUser->EmailAddress,
                    'AccessType' => $authenticatedUser->roles[0]->role->AccessType
                ],
                'user_session' => [
                    'AccessToken' => $token,
                    'TokenType'   => 'Bearer',
                    'ExpiresIn'   => auth()->factory()->getTTL() * 60
                ]
            ]);
        }        
    }    

    /**
     * Generate Token
     * 
     * @param \App\User
     * 
     * @return string
     */
    private function generate_token(User $user)
    {
        return auth()->login($user);
    }    

    /**
     * Return Auth guard
     */
    private function guard()
    {
        return \Auth::guard();
    }

}
