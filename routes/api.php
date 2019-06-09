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

        Route::middleware('auth:api')->group(function () {
            Route::post('logout', 'AuthController@logout');
        });
    });

    Route::middleware('auth:api')->group(function () {
        Route::get('users', 'UserController@getMany');
        Route::get('users/{id}', 'UserController@getOne');
        Route::post('users', 'UserController@create');
        Route::put('users/{id}', 'UserController@update');
        Route::delete('users/{id}', 'UserController@delete');
        Route::post('users/{id}', 'UserController@restore');
        Route::post('users/{userID}/action/linkrole/{roleID}', 'UserController@linkRole');
        Route::delete('users/{userID}/action/unlinkrole/{roleID}', 'UserController@unlinkRole');

        Route::get('roles', 'RoleController@getMany');
        Route::get('roles/list', 'RoleController@getSimpleList');
        Route::get('roles/{id}', 'RoleController@getOne');
        Route::post('roles', 'RoleController@create');
        Route::put('roles/{id}', 'RoleController@update');
        Route::delete('roles/{id}', 'RoleController@delete');
        Route::post('roles/{id}', 'RoleController@restore');
    });
});

