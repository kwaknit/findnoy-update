<?php

namespace App;

use App\Base;

class FiledCaseDocument extends Base
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'filename',
        'filed_case_id'
    ];
}
