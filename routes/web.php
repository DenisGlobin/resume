<?php

use Illuminate\Support\Facades\Route;

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

//Auth::routes();
Auth::routes(['register' => false]);

// Guest route
Route::get('/', 'HomeController@index')->name('home');

// Admin routes
Route::middleware(['auth'])->group(function () {
    Route::resource('users', 'UserController')->only([
        'index', 'update'
    ]);
    Route::resource('experiences', 'ExperienceController')->only([
        'index', 'store', 'update', 'destroy'
    ]);
    Route::resource('abilities', 'AbilityController')->only([
        'index', 'store', 'update', 'destroy'
    ]);
    Route::resource('projects', 'ProjectController')->only([
        'index', 'store', 'update', 'destroy'
    ]);
});