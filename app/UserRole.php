<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    public $timestamps = false;

    protected $fillable = ['user_id', 'role_id'];

    protected $hidden = ['user_id', 'role_id'];

    /**
     * Get Question
     *
     */
    public function role()
    {
        return $this->belongsTo(\App\Role::class);
    }
}
