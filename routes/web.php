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

Route::get('/', 'DashboardController@index')->middleware('auth')->name('dashboard.index');


Route::get('/driver/{driver}/{string}', 'ParseController@get');

Route::prefix('/project/')->middleware('auth')->group(function () {
    Route::view('create', 'admin.dashboard.project.create')->name('project.create');
    Route::post('store', 'ProjectController@store')->name('project.store');
    Route::get('{project}', 'ProjectController@show')->name('project.show')->middleware('can:manage');
    Route::delete('{project}', 'ProjectController@delete')->name('project.delete')->middleware('can:manage');
    Route::post('{project}/assign', 'ProjectController@assign')->name('project.assign')->middleware('can:manage');
});

Route::prefix('/todo')->middleware('auth')->group(function () {
    Route::get('/', 'TodoController@index')->name('todo.index');
    Route::get('/{project}', 'TodoController@show')->name('todo.show');
    Route::post('/sentence/{sentence}/update', 'SentenceController@store')->name('sentence.store');//->middleware('can:edit');
});

Route::prefix('/user')->middleware(['auth', 'can:manage'])->group(function () {
    Route::get('/', 'UserController@index')->name('user.index');
    Route::post('/update', 'UserController@update')->name('user.update');
});

Route::prefix('/profile')->middleware(['auth'])->group(function () {
    Route::get('/', 'UserController@edit')->name('profile.edit');
    Route::put('/', 'UserController@store')->name('profile.update');
});

Route::prefix('/export')->middleware(['auth', 'can:manage'])->group(function () {
    Route::get('{project}', 'ExportController@export')->name('project.export');
});

Route::view('sign-in', 'admin.login')->name('login');

Route::view('sign-up', 'register')->name('register')->middleware(['auth', 'can:manage']);

Route::post('sign-up', 'Auth\AuthController@register')->name('register.attempt')->middleware(['auth', 'can:manage']);

Route::post('sign-in', 'Auth\AuthController@login')->name('login.attempt');

Route::post('logout', 'Auth\AuthController@logout')->name('logout');
