<?php

namespace App;

use App\Base;

class Coverage extends Base
{
    protected $cascadeDeletes = ['focuses'];

    /**
     * The attributes that are mass assignable
     * 
     * @var array
     */
    protected $fillable = ['Name', 'CategoryID'];

    /**
     * Get Parent Category
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(\App\Category::class, 'CategoryID', 'ID');
    }

    /**
     * Get Focuses
     */
    public function focuses()
    {
        return $this->hasMany(\App\Focus::class, 'CoverageID', 'ID');
    }

    public static function boot()
    {
        parent::boot();

        static::restoring(function($coverage) {
            $coverage->focuses()->withTrashed()->restore();
        });
    }
}
