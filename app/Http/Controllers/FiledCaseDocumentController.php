<?php

namespace App\Http\Controllers;

use App\FiledCaseDocument;
use Illuminate\Http\Request;

class FiledCaseDocumentController extends Controller
{
    public function getMany(Request $request)
    {
        $paginatedResult = FiledCaseDocument::orderBy($request->get('sortBy'), $request->get('sortDirection'))->paginate();

        return response()->json($paginatedResult);
    }

    public function getOne($id)
    {
        $data = FiledCaseDocument::findOrFail($id);

        return response()->json($data);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'filename' => 'required',
            'filed_case_id' => 'required|exists:filed_cases,id'
        ]);

        $data = FiledCaseDocument::create($request->all());

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
            'filename' => 'required',
            'filed_case_id' => 'required|exists:filed_cases,id'
        ]);

        $data = FiledCaseDocument::findOrFail($id);
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
        FiledCaseDocument::findOrFail($id)->delete();
        return response()->json('Delete Successful', 200);
    }

    public function restore($id)
    {
        FiledCaseDocument::withTrashed()
            ->findOrFail($id)
            ->restore();

        return response('Restore Successful', 200);
    }
}
