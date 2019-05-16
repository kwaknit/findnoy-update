<?php

namespace App;

use App\Base;

class Answer extends Base
{
    /**
     * The attributes that are mass assignable
     * 
     * @var array
     */
    protected $fillable = ['Name', 'QuestionID', 'IsCorrect'];

    protected $hidden = ['deleted_at', 'created_at', 'updated_at'];

    /**
     * Get Parent Question
     * 
     * 
     */
    public function Question()
    {
        return $this->belongsTo(\App\Question::class, 'QuestionID', 'ID');
    }
}
