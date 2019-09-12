<?php

namespace App\Http\Controllers;

use App\FiledCase;
use Illuminate\Http\Request;

class FiledCaseController extends Controller
{
    public function getMany(Request $request)
    {
        $paginatedResult = FiledCase::with('assigned_officer:id,first_name,last_name')->orderBy($request->get('sortBy'), $request->get('sortDirection'))->paginate();

        return response()->json($paginatedResult);
    }

    public function getSimpleList()
    {
        return response()->json(FiledCase::all('id', 'title as name'));
    }

    public function getOne($id)
    {
        $data = FiledCase::findOrFail($id);

        return response()->json($data);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'type' => 'required|in:wanted_criminal,missing_person,carnapped_vehicle',
            'full_name' => 'required',
            'gender' => 'required|in:male,female',
            'last_seen_place' => 'required',
            'status' => 'required|in:open,ongoing,closed',
            'issued_at' => 'required',
            'assigned_to_user_id' => 'required|exists:users,id',
            'privacy' => 'required|boolean',
            'police_station_id' => 'required|exists:police_stations,id',
        ]);

        $data = FiledCase::create($request->all());

        $result = [
            'message' => 'Create Successful',
            'data' => $data
        ];

        return response()->json($result, 201);
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'type' => 'required|in:wanted_criminal,missing_person,carnapped_vehicle',
            'full_name' => 'required',
            'gender' => 'required|in:male,female',
            'last_seen_place' => 'required',
            'status' => 'required|in:open,ongoing,closed',
            'issued_at' => 'required',
            'assigned_to_user_id' => 'required|exists:users,id',
            'privacy' => 'required|boolean',
            'police_station_id' => 'required|exists:police_stations,id',
        ]);

        $data = FiledCase::findOrFail($id);
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
        FiledCase::findOrFail($id)->delete();
        return response()->json('Delete Successful', 200);
    }

    public function restore($id)
    {
        FiledCase::withTrashed()
            ->findOrFail($id)
            ->restore();

        return response('Restore Successful', 200);
    }
}
