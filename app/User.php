<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, SoftDeletes;

    protected $cascadeDeletes = ['user_roles'];

    protected $dates = ['deleted_at'];
    protected $primaryKey = 'ID';

    /**
     * Override the default per page results
     */
    protected $perPage = 10;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'birthdate',
        'birthplace',
        'gender',
        'civil_status',
        'email',
        'password',
        'type',
        'contact_no',
        'permanent_address',
        'present_address',
        'contact_person',
        'contact_person_no',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    /**
     * Get Questions
     *
     *
     */
    public function roles()
    {
        return $this->hasMany(\App\UserRole::class, 'UserID', 'ID');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
