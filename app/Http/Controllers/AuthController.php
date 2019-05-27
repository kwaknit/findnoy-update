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

        $token = auth()->login($user);

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
                if ($token = $this->guard()->fromUser($user)) {
                    return $this->respondWithToken($token);
                }
            }
        } else {
            return response()->json('Email Address or Password is invalid.', 401);
        }

        return response()->json('Unauthorized', 401);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth()->factory()->getTTL() * 60
        ]);
    }

    /**
     * Logout User
     */
    public function logout()
    {
        $this->guard()->logout();
        return response()->json([
            'status' => 'success',
            'msg' => 'Logged out Successfully.'
        ], 200);
    }

    /**
     * Get authenticated user
     */
    public function user(Request $request)
    {
        $user = User::find(Auth::user()->id);
        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);
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

    /**
     * Return auth guard
     */
    private function guard()
    {
        return \Auth::guard();
    }

}
