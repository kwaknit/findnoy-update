<?php

namespace App;
use App\Base;

class Question extends Base
{
    protected $cascadeDeletes = ['answers'];

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

    public static function boot()
    {
        parent::boot();

        static::restoring(function($question) {
            $question->answers()->withTrashed()->restore();
        });
    }
}
