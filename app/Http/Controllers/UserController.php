<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\AuthController;

class UserController extends Controller
{
    public function getMany(Request $request)
    {
        $paginatedResult = User::orderBy($request->get('sortBy'), $request->get('sortDirection'))->paginate();

        return response()->json($paginatedResult);
    }

    public function getOne($id)
    {
        $data = User::with('role.role:id,name')->findOrFail($id);

        return response()->json($data);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'birthdate' => 'required',
            'birthplace' => 'required',
            'gender' => 'required',
            'civil_status' => 'required',
            'email' => 'required|email|unique:users,email',
            'type' => 'required',
            'contact_no' => 'required',
            'permanent_address' => 'required',
            'present_address' => 'required',
            'contact_person' => 'required',
            'contact_person_no' => 'required',
        ]);

        $toSave = $request->all();
        $toSave['password'] = Hash::make(123123);

        $data = User::create($toSave);

        // Every user by default has a User role
        $data->role()->create([
            'user_id' => $data->id,
            'role_id' => 1905
        ]);

        $result = [
            'message' => 'Create Successful',
            'data' => $data
        ];

        return response()->json($result, 201);
    }

    public function update($id, Request $request)
    {
        $data = User::findOrFail($id);
        $data->update($request->all());

        $result = [
            'message' => 'Update Successful',
            'data' => $data
        ];

        return response()->json($result, 200);
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        return response()->json('Delete Successful', 200);
    }

    public function restore($id)
    {
        User::withTrashed()
            ->findOrFail($id)
            ->restore();

        return response('Restore Successful', 200);
    }

    public function linkRole($userID, $roleID)
    {
        $this->unlinkRole($userID, $roleID);

        $user = User::findOrFail($userID);

        $user->role()->create([
            'user_id' => $user->id,
            'role_id' => $roleID
        ]);

        return response()->json("Role Changed", 201);
    }

    private function unlinkRole($userID, $roleID)
    {
        $user = User::findOrFail($userID);
        $user->role()->where('user_id', (int)$userID)->delete();
    }
}
