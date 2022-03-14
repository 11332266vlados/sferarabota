<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');
Route::match(['get', 'post'], '/users', 'UsersController@index')->name('users');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/card/{id}', 'UsersController@card')->name('card');

    Route::group(['middleware' => 'group'], function () {

        Route::prefix('users')->group(function () {
            Route::post('edit_post/{id}', 'UsersController@editPost');
            Route::post('edit_skills/{id}', 'UsersController@editSkills');
            Route::post('set_admin/{id}', 'UsersController@setAdmin');
        });

        Route::prefix('posts')->group(function () {
            Route::get('/', 'PostsController@index');
            Route::post('add', 'PostsController@add');
            Route::post('edit', 'PostsController@edit');
            Route::post('delete', 'PostsController@delete');
        });

        Route::prefix('skills')->group(function () {
            Route::get('/', 'SkillsController@index');
            Route::post('add', 'SkillsController@add');
            Route::post('edit', 'SkillsController@edit');
            Route::post('delete', 'SkillsController@delete');
        });
    });
});

