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
        Route::get('list', 'UserController@getSimpleList');
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
        Route::get('list', 'CrimeController@getSimpleList');
        Route::get('{id}', 'CrimeController@getOne');
        Route::post('', 'CrimeController@create');
        Route::put('{id}', 'CrimeController@update');
        Route::delete('{id}', 'CrimeController@delete');
        Route::post('{id}', 'CrimeController@restore');
    });

    // Police Stations
    Route::prefix('police-stations')->group(function () {
        Route::get('', 'PoliceStationController@getMany');
        Route::get('list', 'PoliceStationController@getSimpleList');
        Route::get('{id}', 'PoliceStationController@getOne');
        Route::post('', 'PoliceStationController@create');
        Route::put('{id}', 'PoliceStationController@update');
        Route::delete('{id}', 'PoliceStationController@delete');
        Route::post('{id}', 'PoliceStationController@restore');
    });

    // Filed Cases
    Route::prefix('filed-cases')->group(function () {
        Route::get('', 'FiledCaseController@getMany');
        Route::get('list', 'FiledCaseController@getSimpleList');
        Route::get('{id}', 'FiledCaseController@getOne');
        Route::get('{full_name}', 'FiledCaseController@getOne');
        Route::get('{last_seen_place}', 'FiledCaseController@getOne');
        Route::get('{description}', 'FiledCaseController@getOne');
        Route::get('{type}', 'FiledCaseController@getOne');
        Route::post('', 'FiledCaseController@create');
        Route::put('{id}', 'FiledCaseController@update');
        Route::delete('{id}', 'FiledCaseController@delete');
        Route::post('{id}', 'FiledCaseController@restore');
    });

    // Committed Crimes
    Route::prefix('committed-crimes')->group(function () {
        Route::get('', 'CommittedCrimeController@getMany');
        Route::get('{id}', 'CommittedCrimeController@getOne');
        Route::post('', 'CommittedCrimeController@create');
        Route::put('{id}', 'CommittedCrimeController@update');
        Route::delete('{id}', 'CommittedCrimeController@delete');
        Route::post('{id}', 'CommittedCrimeController@restore');
    });

    // Committed Crimes
    Route::prefix('filed-case-documents')->group(function () {
        Route::get('', 'FiledCaseDocumentController@getMany');
        Route::get('{id}', 'FiledCaseDocumentController@getOne');
        Route::post('', 'FiledCaseDocumentController@create');
        Route::put('{id}', 'FiledCaseDocumentController@update');
        Route::delete('{id}', 'FiledCaseDocumentController@deleteFile');
        Route::post('{id}', 'FiledCaseDocumentController@restore');
        Route::post('{id}/action/upload', 'FiledCaseDocumentController@upload');
        Route::get('{id}/action/download', 'FiledCaseDocumentController@download');
    });
});

