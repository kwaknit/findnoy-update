<?php

namespace App;
    
use App\Base;

class Focus extends Base
{
    public $table = 'focuses';

    /**
     * The attributes that are mass assignable
     * 
     * @var array
     */
    protected $fillable = ['Name', 'CoverageID'];

    /**
     * Get Parent Coverage
     * 
     * 
     */
    public function Coverage()
    {
        return $this->belongsTo(\App\Coverage::class, 'CoverageID', 'ID');
    }
}
