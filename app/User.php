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
        'FirstName',
        'MiddleName',
        'LastName',
        'CompanyName',
        'OfficeNumber',
        'FaxNumber',
        'HomeNumber',
        'MobileNumber', 
        'EmailAddress', 
        'Password',
        'City',
        'PostalCode',
        'Country'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'Password'
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
