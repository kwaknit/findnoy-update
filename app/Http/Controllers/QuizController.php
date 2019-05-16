<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz;
use App\QuizQuestion;

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

    public function getOptions()
    {
        $categories = \App\Category::all('ID', 'Name');
        $coverages = \App\Coverage::all('ID', 'Name');
        $focuses = \App\Focus::all('ID', 'Name');

        return response()->json([$categories, $coverages, $focuses]);
    }

    public function getQuestions(Request $request)
    {
        $paginatedResult = QuizQuestion::with('question:ID,Name', 'question.answers')->where('QuizID', (int)$request->get('quizID'))->paginate();

        return response()->json($paginatedResult);
    }

    public function addQuestions(Request $request)
    {       
        $questions = $request->QuizQuestions;
        $count = count($questions);

        QuizQuestion::insert($questions);

        return response()->json("Successfully added $count questions", 201);
    }

    public function deleteQuestions($quizID, $questionID)
    {
        QuizQuestion::where('QuizID', (int)$quizID)->where('QuestionID', (int)$questionID)->delete();
        return response()->json(null, 204);
    }
}
