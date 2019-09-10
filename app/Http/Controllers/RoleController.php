<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;

class RoleController extends Controller
{
    public function getMany(Request $request)
    {
        $paginatedResult = Role::orderBy($request->get('sortBy'), $request->get('sortDirection'))->paginate();

        return response()->json($paginatedResult);
    }

    public function getOne($id)
    {
        return response()->json(Role::findOrFail($id));
    }

    public function getSimpleList()
    {
        return response()->json(Role::all('id', 'name', 'access_type'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'access_type' => 'required',
        ]);

        $role = Role::create($request->all());

        $data = [
            'message' => 'Successfully created a Role',
            'data' => $role
        ];

        return response()->json($data, 201);
    }

    public function update($id, Request $request)
    {
        $role = Role::findOrFail($id);
        $role->update($request->all());

        $data = [
            'message' => 'Successfully updated a role',
            'data' => $role
        ];

        return response()->json($data, 200);
    }

    public function delete($id)
    {
        Role::findOrFail($id)->delete();
        return response()->json(null, 204);
    }

    public function restore($id)
    {
        Role::withTrashed()
            ->findOrFail($id)
            ->restore();

        return response('Restored Successfully', 200);
    }
}
