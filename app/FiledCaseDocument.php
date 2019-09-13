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
        'path',
        'filename',
        'filed_case_id'
    ];

    public function filed_case()
    {
        return $this->belongsTo(\App\FiledCase::class);
    }
}
