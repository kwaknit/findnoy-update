<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    public $timestamps = false;

    protected $fillable = ['UserID', 'RoleID'];

    protected $hidden = ['UserID', 'RoleID'];

    /**
     * Get Question
     * 
     */
    public function role()
    {
        return $this->belongsTo(\App\Role::class, 'RoleID', 'ID');
    }
}
