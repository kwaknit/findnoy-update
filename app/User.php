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
        'latitude',
        'longitude',
        'police_station_id'
    ];

    // protected $casts = [
    //     'latitude' => 'integer',
    //     'longitude' => 'integer'
    // ];

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
    public function role()
    {
        return $this->hasOne(\App\UserRole::class);
    }

    public function police_station()
    {
        return $this->belongsTo(\App\PoliceStation::class);
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
