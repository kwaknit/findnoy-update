<?php

namespace App;

use App\Base;

class CommittedCrime extends Base
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'filed_case_id',
        'crime_id'
    ];

    public function filed_case()
    {
        return $this->belongsTo(\App\FiledCase::class);
    }

    public function crime()
    {
        return $this->belongsTo(\App\Crime::class);
    }
}
