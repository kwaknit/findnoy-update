<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    public $timestamps = false;

    protected $fillable = ['QuizID', 'QuestionID'];

    protected $hidden = ['QuizID', 'QuestionID'];

    /**
     * Get Question
     * 
     */
    public function question()
    {
        return $this->belongsTo(\App\Question::class, 'QuestionID', 'ID');
    }
}
