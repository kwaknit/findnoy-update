<?php

namespace App\Http\Controllers;

use App\Crime;
use Illuminate\Http\Request;

class CrimeController extends Controller
{
    public function getMany(Request $request)
    {
        $paginatedResult = Crime::orderBy($request->get('sortBy'), $request->get('sortDirection'))->paginate();

        return response()->json($paginatedResult);
    }

    public function getOne($id)
    {
        $data = Crime::findOrFail($id);

        return response()->json($data);
    }

    public function getSimpleList()
    {
        return response()->json(Crime::all('id', 'name'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:crimes,name',
        ]);

        $data = Crime::create([
            'name'    => $request->name,
            'description' => $request->description
        ]);

        $result = [
            'message' => 'Create Successful',
            'data' => $data
        ];

        return response()->json($result, 201);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $data = Crime::findOrFail($id);
        $data->update($request->all());
        $data->save();

        $result = [
            'message' => 'Update Successful',
            'data' => $data
        ];

        return response()->json($result, 200);
    }

    public function delete($id)
    {
        Crime::findOrFail($id)->delete();
        return response()->json('Delete Successful', 200);
    }

    public function restore($id)
    {
        Crime::withTrashed()
            ->findOrFail($id)
            ->restore();

        return response('Restore Successful', 200);
    }
}
