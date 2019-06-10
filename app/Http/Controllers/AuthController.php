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
            'MiddleName' => 'required',
            'LastName' => 'required',
            'CompanyName' => 'required',
            'OfficeNumber' => 'required',
            'EmailAddress' => 'required|email|unique:users,EmailAddress',
            'Password' => 'required|min:8',
            'City' => 'required',
            'PostalCode' => 'required|size:4',
            'Country' => 'required'
        ]);

        $user = User::create([
            'FirstName'    => $request->FirstName,
            'MiddleName' => $request->MiddleName,
            'LastName' => $request->LastName,
            'CompanyName' => $request->CompanyName,
            'OfficeNumber' => $request->OfficeNumber,
            'FaxNumber' => $request->FaxNumber,
            'HomeNumber' => $request->HomeNumber,
            'MobileNumber' => $request->MobileNumber,
            'EmailAddress' => $request->EmailAddress,
            'Password' => Hash::make($request->Password),
            'City' => $request->City,
            'PostalCode' => $request->PostalCode,
            'Country' => $request->Country,
        ]);

        // Every user by default has a User role
        $user->roles()->create([
            'UserID' => $user->ID,
            'RoleID' => 1
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
            $accessType = ($authenticatedUser->roles && count($authenticatedUser->roles) > 0) ? $authenticatedUser->roles[0]->role->AccessType : null;

            return response()->json([
                'user_info' => [
                    'ID' => $authenticatedUser->ID,
                    'FirstName' => $authenticatedUser->FirstName,
                    'LastName' => $authenticatedUser->LastName,
                    'EmailAddress' => $authenticatedUser->EmailAddress,
                    'AccessType' => $accessType
                ],
                'user_session' => [
                    'AccessToken' => $token,
                    'TokenType'   => 'Bearer',
                    'ExpiresIn'   => auth()->factory()->getTTL() * 600
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
