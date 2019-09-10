<?php

namespace App\Http\Controllers;

use App\PoliceStation;
use Illuminate\Http\Request;

class PoliceStationController extends Controller
{
    public function getMany(Request $request)
    {
        $paginatedResult = PoliceStation::orderBy($request->get('sortBy'), $request->get('sortDirection'))->paginate();

        return response()->json($paginatedResult);
    }

    public function getOne($id)
    {
        $data = PoliceStation::findOrFail($id);

        return response()->json($data);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'number' => 'required',
            'address' => 'required',
            'contact_no' => 'required',
            'chief_police' => 'required',
        ]);

        $data = PoliceStation::create($request->all());

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
            'number' => 'required',
            'address' => 'required',
            'contact_no' => 'required',
            'chief_police' => 'required',
        ]);

        $data = PoliceStation::findOrFail($id);
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
        PoliceStation::findOrFail($id)->delete();
        return response()->json('Delete Successful', 200);
    }

    public function restore($id)
    {
        PoliceStation::withTrashed()
            ->findOrFail($id)
            ->restore();

        return response('Restore Successful', 200);
    }
}
