<?php

namespace App;
use App\Base;

class Quiz extends Base
{
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'IsFeatured' => false,
    ];

    /**
     * The attributes that are mass assignable
     * 
     * @var array
     */
    protected $fillable = ['Name', 'CoverageID', 'CategoryID', 'FocusID', 'QuestionCount', 'Time', 'IsFeatured'];

    /**
     * Get Category
     * 
     * 
     */
    public function category()
    {
        return $this->belongsTo(\App\Category::class, 'CategoryID', 'ID');
    }

    /**
     * Get Coverage
     * 
     * 
     */
    public function coverage()
    {
        return $this->belongsTo(\App\Coverage::class, 'CoverageID', 'ID');
    }

    /**
     * Get Focus
     * 
     * 
     */
    public function focus()
    {
        return $this->belongsTo(\App\Focus::class, 'FocusID', 'ID');
    }

    /**
     * Get Questions
     * 
     * 
     */
    public function questions()
    {
        return $this->hasMany(\App\QuizQuestion::class, 'QuizID', 'ID');
    }
}
