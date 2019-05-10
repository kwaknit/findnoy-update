<?php

namespace App;
use App\Base;

class Question extends Base
{
    /**
     * The attributes that are mass assignable
     * 
     * @var array
     */
    protected $fillable = ['Name', 'CoverageID', 'CategoryID', 'FocusID'];

    /**
     * Get Answers
     */
    public function answers()
    {
        return $this->hasMany(\App\Answer::class, 'QuestionID', 'ID');
    }
}
