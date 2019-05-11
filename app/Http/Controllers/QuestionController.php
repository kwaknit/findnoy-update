<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Question;

class QuestionController extends Controller
{
    private $relationship = ['answers:ID,Name,IsCorrect,QuestionID'];

    public function getMany(Request $request)
    {
        $paginatedResult = Question::with($this->relationship)->orderBy($request->get('sortBy'), $request->get('sortDirection'))->paginate();

        return response()->json($paginatedResult);
    }

    public function getOne($id)
    {
        return response()->json(Question::with($this->relationship)->findOrFail($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'CategoryID' => 'required|exists:categories,ID',
            'CoverageID' => 'exists:coverages,ID',
            'FocusID' => 'exists:focuses,ID',
            'Name' => 'required|unique:quizzes,Name',
        ]);

        $question = Question::create($request->all());

        $data = [
            'message' => 'Successfully created a Question',
            'data' => $question
        ];

        return response()->json($data, 201);
    }

    public function delete($id)
    {
        Question::findOrFail($id)->delete();
        return response()->json('Deleted Successfully', 204);
    }

    public function restore($id)
    {
        Question::withTrashed()
            ->findOrFail($id)
            ->restore();

        return response('Restored Successfully', 200);
    }

    public function import(Request $request)
    {
        if ($request->hasFile('file'))
        {
            $file = $request->file('file');
            $allowedExtensions = Config::get('import.allowedExtensions');
            $maxFileSize = Config::get('import.maxFileSize');

            if (in_array(strtolower($file->getClientOriginalExtension()), $allowedExtensions))
            {
                if ($file->getSize() <= $maxFileSize)
                {
                    if (($handle = fopen($file->path(), 'r')) !== FALSE)
                    {
                        $counter = 0;

                        while (($data = fgetcsv($handle, 1000, ',')) !== FALSE)
                        {
                            $question = Question::create([
                                'Name' => trim($data[0]),
                                'CategoryID' => (int)$data[7],
                                'CoverageID' => (count($data) >= 9) ? (int)$data[8] : null,
                                'FocusID' => (count($data) >= 10) ? (int)$data[9] : null,
                            ]);

                            for ($x = 1; $x <=5; $x++)
                            {
                                $question->answers()->create([
                                    'Name' => trim($data[$x]),
                                    'IsCorrect' => trim($data[$x]) === trim($data[6])
                                ]);
                            }

                            $counter++;
                        }

                        fclose($handle);

                        return response()->json("Successfully imported $counter questions.", 201);
                    }                    
                } else {
                    return response()->json("File has exceeded the maximum filesize required.", 400);
                }
            } else {
                return response()->json("File must have an extension of .csv", 400);
            }
        }
    }
}
