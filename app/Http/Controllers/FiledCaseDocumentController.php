<?php

namespace App\Http\Controllers;

use App\FiledCaseDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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

    public function upload(Request $request, $id)
    {

        $file_data = FiledCaseDocument::findOrFail($id);
        $uploaded_file = $request->file("file");
        $file_extension = $uploaded_file->extension();
        $folder = $file_data->filed_case->title;
        $file_name = "$file_data->title.$file_extension";

        if (Storage::disk("local")->exists("$folder/$file_name"))
        {
            return response()->json("$file_name already exists.", 200);
        }

        if ($path = Storage::putFileAs($folder, $request->file("file"), $file_name, 'public'))
        {
            $file_data->path = $path;
            $file_data->filename = $file_name;
            $file_data->save();

            $data = [
                "message" => "$file_name was uploaded successfully.",
                "data" => $file_data
            ];

            return response()->json($data, 200);
        }

        return response("There something wrong in the process. Please contact administrator", 200);
    }
}
