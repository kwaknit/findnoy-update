<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;

class Base extends Model
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * Override the default per page results
     */
    protected $perPage = 10;
}
