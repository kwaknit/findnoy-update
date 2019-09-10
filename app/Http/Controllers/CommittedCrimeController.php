<?php

namespace App\Http\Controllers;

use App\CommittedCrime;
use Illuminate\Http\Request;

class CommittedCrimeController extends Controller
{
    public function getMany(Request $request)
    {
        $paginatedResult = CommittedCrime::orderBy($request->get('sortBy'), $request->get('sortDirection'))->paginate();

        return response()->json($paginatedResult);
    }

    public function getOne($id)
    {
        $data = CommittedCrime::findOrFail($id);

        return response()->json($data);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'crime_id' => 'required|exists:crimes,id',
            'filed_case_id' => 'required|exists:filed_cases,id'
        ]);

        $data = CommittedCrime::create($request->all());

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

        $data = CommittedCrime::findOrFail($id);
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
        CommittedCrime::findOrFail($id)->delete();
        return response()->json('Delete Successful', 200);
    }

    public function restore($id)
    {
        CommittedCrime::withTrashed()
            ->findOrFail($id)
            ->restore();

        return response('Restore Successful', 200);
    }
}
