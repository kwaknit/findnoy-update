<?php

namespace App;

use App\Base;

class PoliceStation extends Base
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'number',
        'address',
        'contact_no',
        'chief_police',
    ];
}
