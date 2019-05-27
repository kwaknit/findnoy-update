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
        Route::get('categories', 'CategoryController@getMany');
        Route::get('categories/list', 'CategoryController@getSimpleList');
        Route::get('categories/{id}', 'CategoryController@getOne');
        Route::post('categories', 'CategoryController@create');
        Route::put('categories/{id}', 'CategoryController@update');
        Route::delete('categories/{id}', 'CategoryController@delete');
        Route::post('categories/{id}', 'CategoryController@restore');

        Route::get('coverages', 'CoverageController@getMany');
        Route::get('coverages/list', 'CoverageController@getSimpleList');
        Route::get('coverages/{id}', 'CoverageController@getOne');
        Route::post('coverages', 'CoverageController@create');
        Route::put('coverages/{id}', 'CoverageController@update');
        Route::delete('coverages/{id}', 'CoverageController@delete');
        Route::post('coverages/{id}', 'CoverageController@restore');

        Route::get('focuses', 'FocusController@getMany');
        Route::get('focuses/list', 'FocusController@getSimpleList');
        Route::get('focuses/{id}', 'FocusController@getOne');
        Route::post('focuses', 'FocusController@create');
        Route::put('focuses/{id}', 'FocusController@update');
        Route::delete('focuses/{id}', 'FocusController@delete');
        Route::post('focuses/{id}', 'FocusController@restore');

        Route::get('quizzes', 'QuizController@getMany');
        Route::get('quizzes/{id}', 'QuizController@getOne');
        Route::get('quizzes/{id}/questions', 'QuizController@getQuestion');
        Route::post('quizzes', 'QuizController@create');
        Route::put('quizzes/{id}', 'QuizController@update');
        Route::delete('quizzes/{id}', 'QuizController@delete');
        Route::post('quizzes/{id}/action/restore', 'QuizController@restore');
        Route::post('quizzes/{quizID}/action/linkquestion/{questionID}', 'QuizController@linkQuestion');
        Route::delete('quizzes/{quizID}/action/unlinkquestion/{questionID}', 'QuizController@unlinkQuestion');

        Route::get('questions', 'QuestionController@getMany');
        Route::get('questions/list', 'QuestionController@getSimpleList');
        Route::get('questions/{id}', 'QuestionController@getOne');
        Route::post('questions', 'QuestionController@create');
        Route::post('questions/import', 'QuestionController@import');
        Route::put('questions/{id}', 'QuestionController@update');
        Route::delete('questions/{id}', 'QuestionController@delete');
        Route::post('questions/{id}', 'QuestionController@restore');

        Route::get('answers', 'AnswerController@getMany');
        Route::get('answers/list', 'AnswerController@getSimpleList');
        Route::get('answers/{id}', 'AnswerController@getOne');
        Route::post('answers', 'AnswerController@create');
        Route::put('answers/{id}', 'AnswerController@update');
        Route::delete('answers/{id}', 'AnswerController@delete');
        Route::post('answers/{id}', 'AnswerController@restore');

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

