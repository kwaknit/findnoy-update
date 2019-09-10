<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('/register', 'AuthController@register');
        Route::post('/login', 'AuthController@login');
        Route::post('/password-reset', 'AuthController@password_reset');

        Route::middleware('auth:api')->group(function () {
            Route::post('logout', 'AuthController@logout');
        });
    });

    // Users
    Route::prefix('users')->group(function () {
        Route::get('', 'UserController@getMany');
        Route::get('{id}', 'UserController@getOne');
        Route::post('', 'UserController@create');
        Route::put('{id}', 'UserController@update');
        Route::delete('{id}', 'UserController@delete');
        Route::post('{id}', 'UserController@restore');
        Route::post('{userID}/action/linkrole/{roleID}', 'UserController@linkRole');
    });

    // Roles
    Route::prefix('roles')->group(function () {
        Route::get('', 'RoleController@getMany');
        Route::get('list', 'RoleController@getSimpleList');
        Route::get('{id}', 'RoleController@getOne');
        Route::post('', 'RoleController@create');
        Route::put('{id}', 'RoleController@update');
        Route::delete('{id}', 'RoleController@delete');
        Route::post('{id}', 'RoleController@restore');
    });

    // Crimes
    Route::prefix('crimes')->group(function () {
        Route::get('', 'CrimeController@getMany');
        Route::get('{id}', 'CrimeController@getOne');
        Route::post('', 'CrimeController@create');
        Route::put('{id}', 'CrimeController@update');
        Route::delete('{id}', 'CrimeController@delete');
        Route::post('{id}', 'CrimeController@restore');
    });

    // Police Stations
    Route::prefix('police-stations')->group(function () {
        Route::get('', 'PoliceStationController@getMany');
        Route::get('{id}', 'PoliceStationController@getOne');
        Route::post('', 'PoliceStationController@create');
        Route::put('{id}', 'PoliceStationController@update');
        Route::delete('{id}', 'PoliceStationController@delete');
        Route::post('{id}', 'PoliceStationController@restore');
    });
});

