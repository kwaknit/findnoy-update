<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Question;

class QuestionController extends Controller
{
    private $relationship = ['answers:ID,Name,IsCorrect,QuestionID'];

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
                    $data = array_map('str_getcsv', file($file));     
                    $count = count($data);
                    
                    if ($data != null && $count > 0)
                    {
                        foreach ($data as $question)
                        {
                            $question = Question::create([
                                'Name' => $question[0],
                                'CategoryID' => (int)$question[7],
                            ]);

                            for ($x = 1; $x <=5; $x++)
                            {
                                $question->answers()->create([
                                    'Name' => $question[$x],
                                    'IsCorrect' => $question[$x] === $question[6]
                                ]);
                            }
                        }                        

                        return response()->json("Successfully imported $count questions", 201);
                    }
                    
                }
            }
        }
    }
}
