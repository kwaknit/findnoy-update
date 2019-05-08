<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Focus;

class FocusController extends Controller
{
    private $relationship = ['coverage:ID,Name'];

    public function getMany(Request $request)
    {
        $paginatedResult = Focus::with($this->relationship)->orderBy($request->get('sortBy'), $request->get('sortDirection'))->paginate();

        return response()->json($paginatedResult);
    }

    public function getSimpleList()
    {
        return response()->json(Focus::all('ID', 'Name'));
    }

    public function getOne($id)
    {
        return response()->json(Focus::with($this->relationship)->findOrFail($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'Name' => 'required',
            'CoverageID' => 'required|exists:coverages,ID'
        ]);

        $focus = Focus::create($request->all());

        $data = [
            'message' => 'Successfully created a Focus',
            'data' => $focus
        ];

        return response()->json($data, 201);
    }

    public function update($id, Request $request)
    {
        $focus = Focus::findOrFail($id);
        $focus->update($request->all());

        $data = [
            'message' => 'Successfully updated a focus',
            'data' => $focus
        ];

        return response()->json($data, 200);
    }

    public function delete($id)
    {
        Focus::findOrFail($id)->delete();
        return response()->json('Deleted Successfully', 204);
    }

    public function restore($id)
    {
        Focus::withTrashed()
            ->findOrFail($id)
            ->restore();

        return response('Restored Successfully', 200);
    }
}
