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
        return response()->json(Quiz::findOrFail($id));
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

    public function getQuestion($id) {
        $quiz = QuizQuestion::with('question:ID,Name', 'question.answers')->where('QuizID', $id)->paginate();

        return response()->json($quiz);
    }

    public function getQuestionID($id) {
        $idArr = QuizQuestion::select('QuestionID')->where('QuizID', $id)->get();

        $data = [];

        if (count($idArr) > 0) 
        {
            for ($x = 0; $x < count($idArr); $x++)
            {
                array_push($data, $idArr[$x]->QuestionID);
            }
        }

        return response()->json($data);
    }

    public function linkQuestion($quizID, $questionID)
    {
        $quiz = Quiz::findOrFail($quizID);

        $quiz->questions()->create([
            'QuizID' => $quiz->ID,
            'QuestionID' => $questionID
        ]);

        return response()->json('Question Added', 201);
    }

    public function unlinkQuestion($quizID, $questionID)
    {
        $quiz = Quiz::findOrFail($quizID);

        $quiz->questions()->where('QuestionID', (int)$questionID)->delete();

        return response()->json(null, 204);
    }
}
