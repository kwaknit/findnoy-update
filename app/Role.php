<?php

namespace App;

use App\Base;

class Role extends Base
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Name', 'AccessType'
    ];
}
