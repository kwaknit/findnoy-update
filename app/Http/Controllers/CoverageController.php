<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coverage;

class CoverageController extends Controller
{
    private $relationship = ['category:ID,Name', 'focuses:ID,Name,CoverageID'];

    public function getMany(Request $request)
    {
        $paginatedResult = Coverage::with($this->relationship)->orderBy($request->get('sortBy'), $request->get('sortDirection'))->paginate();

        return response()->json($paginatedResult);
    }

    public function getSimpleList()
    {
        return response()->json(Coverage::all('ID', 'Name'));
    }

    public function getOne($id)
    {
        return response()->json(Coverage::with($this->relationship)->findOrFail($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'Name' => 'required|unique:categories,Name'
        ]);

        $coverage = Coverage::create($request->all());

        $data = [
            'message' => 'Successfully created a Coverage',
            'data' => $coverage
        ];

        return response()->json($data, 201);
    }

    public function update($id, Request $request)
    {
        $coverage = Coverage::findOrFail($id);
        $coverage->update($request->all());

        $data = [
            'message' => 'Successfully updated a Coverage',
            'data' => $coverage
        ];

        return response()->json($data, 200);
    }

    public function delete($id)
    {
        Coverage::findOrFail($id)->delete();
        return response()->json('Deleted Successfully', 204);
    }

    public function restore($id)
    {
        Coverage::withTrashed()
            ->findOrFail($id)
            ->restore();

        return response('Restored Successfully', 200);
    }
}
