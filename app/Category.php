<?php

namespace App;

use App\Base;
use Illuminate\Database\Eloquent\SoftDeletes;
    
class Category extends Base
{
    use SoftDeletes;

    protected $cascadeDeletes = ['coverages'];

    /**
     * The attributes that are mass assignable
     * 
     * @var array
     */
    protected $fillable = ['Name'];

    /**
     * Get Coverages
     */
    public function coverages()
    {
        return $this->hasMany(\App\Coverage::class, 'CategoryID', 'ID');
    }

    public static function boot()
    {
        parent::boot();

        static::restoring(function($category) {
            $category->coverages()->withTrashed()->get()
                ->each(function ($coverage) {
                    $coverage->restore();
                    $coverage->focuses()->withTrashed()->restore();
                });
        });
    }
}
