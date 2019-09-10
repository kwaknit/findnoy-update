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
}
