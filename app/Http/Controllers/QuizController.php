<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz;

class QuizController extends Controller
{
    private $relationship = ['category:ID,Name', 'coverage:ID,Name', 'focus:ID,Name'];

    public function getMany(Request $request)
    {
        $paginatedResult = Quiz::with($this->relationship)->orderBy($request->get('sortBy'), $request->get('sortDirection'))->paginate();

        return response()->json($paginatedResult);
    }

    public function getOne($id)
    {
        return response()->json(Quiz::with($this->relationship)->findOrFail($id));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'CategoryID' => 'required|exists:categories,ID',
            'CoverageID' => 'required|exists:coverages,ID',
            'FocusID' => 'required|exists:focuses,ID',
            'Name' => 'required|unique:quizzes,Name',
            'QuestionCount' => 'required',
            'Time' => 'required',
            'IsFeatured' => 'required'
        ]);

        $quiz = Quiz::create($request->all());

        $data = [
            'message' => 'Successfully created a Quiz',
            'data' => $quiz
        ];

        return response()->json($data, 201);
    }

    public function update($id, Request $request)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->update($request->all());

        $data = [
            'message' => 'Successfully updated a quiz',
            'data' => $quiz
        ];

        return response()->json($data, 200);
    }

    public function delete($id)
    {
        Quiz::findOrFail($id)->delete();
        return response()->json(null, 204);
    }

    public function restore($id)
    {
        Quiz::withTrashed()
            ->findOrFail($id)
            ->restore();

        return response('Restored Successfully', 200);
    }
}
