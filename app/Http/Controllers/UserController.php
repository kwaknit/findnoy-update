<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MailController;

class UserController extends Controller
{
    public function getMany(Request $request)
    {
        $paginatedResult = User::orderBy($request->get('sortBy'), $request->get('sortDirection'))->paginate();

        return response()->json($paginatedResult);
    }

    public function getOne($id)
    {
        $data = User::with(['role.role:id,name', 'police_station:id,name'])->findOrFail($id);

        return response()->json($data);
    }

    public function getSimpleList()
    {
        return response()->json(User::select('id', DB::raw("CONCAT(first_name, ' ', last_name) as name"), 'latitude', 'longitude')->where('type', 'field_officer')->get());
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

        $password = Hash::make(AuthController::random_password_generator());

        $toSave = $request->all();
        $toSave['password'] = $password;

        // email password

        $data = User::create($toSave);

        // Every user by default has a User role
        $data->role()->create([
            'user_id' => $data->id,
            'role_id' => 1905
        ]);

        MailController::registration_info_email([
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'password' => $password
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
