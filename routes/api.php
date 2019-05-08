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
Route::get('quizzes/list', 'QuizController@getSimpleList');
Route::get('quizzes/{id}', 'QuizController@getOne');
Route::post('quizzes', 'QuizController@create');
Route::put('quizzes/{id}', 'QuizController@update');
Route::delete('quizzes/{id}', 'QuizController@delete');
Route::post('quizzes/{id}', 'QuizController@restore');

Route::post('questions/import', 'QuestionController@import');
