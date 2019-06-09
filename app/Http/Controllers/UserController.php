<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function getMany(Request $request)
    {
        $paginatedResult = User::orderBy($request->get('sortBy'), $request->get('sortDirection'))->paginate();

        return response()->json($paginatedResult);
    }

    public function getOne($id)
    {
        $user = User::with('roles.role:ID')->findOrFail($id);

        return response()->json($user);
    }

    private function mapID($value)
    {
        return 1;
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'FirstName' => 'required',
            'MiddleName' => 'required',
            'LastName' => 'required',
            'CompanyName' => 'required',
            'EmailAddress' => 'required|email|unique:users,EmailAddress',
            'City' => 'required',
            'PostalCode' => 'required|size:4',
            'Country' => 'required'
        ]);

        $user = User::create($request->all());

        // Every user by default has a User role
        $user->roles()->create([
            'UserID' => $user->ID,
            'RoleID' => 1
        ]);

        $data = [
            'message' => 'Successfully created a User',
            'data' => $user
        ];

        return response()->json($data, 201);
    }

    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        $data = [
            'message' => 'Successfully updated a user',
            'data' => $user
        ];

        return response()->json($data, 200);
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        return response()->json(null, 204);
    }

    public function restore($id)
    {
        User::withTrashed()
            ->findOrFail($id)
            ->restore();

        return response('Restored Successfully', 200);
    }

    public function linkRole($userID, $roleID)
    {
        $user = User::findOrFail($userID);

        $user->roles()->create([
            'UserID' => $user->ID,
            'RoleID' => $roleID
        ]);

        return response()->json("Role Added", 201);
    }

    public function unlinkRole($userID, $roleID)
    {
        $user = User::findOrFail($userID);

        $user->roles()->where('RoleID', (int)$roleID)->delete();

        return response()->json(null, 204);
    }
}
