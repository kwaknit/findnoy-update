<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;

class AnswerController extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request, [
            'QuestionID' => 'required|exists:questions,ID',
            'Name' => 'required|unique:quizzes,Name',
            'IsCorrect' => 'required|boolean',
        ]);

        $question = Answer::create($request->all());

        $data = [
            'message' => 'Successfully created a Answer',
            'data' => $question
        ];

        return response()->json($data, 201);
    }
}
