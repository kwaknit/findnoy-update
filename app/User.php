<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Base;

class User extends Base
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'FirstName', 'LastName', 'MobileNumber', 'EmailAddress', 'Password', 'IsTeaching', 'School', 'YearGraduated'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'Password',
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
}
