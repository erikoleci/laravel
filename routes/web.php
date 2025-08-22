<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Auth::routes();

// Home route
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// ------------------- Project Routes -------------------
Route::middleware('auth')->group(function () {
    Route::resource('projects', 'ProjectController')->except(['show', 'create', 'edit']);
    Route::get('projects/stats', 'ProjectController@stats')->name('projects.stats');
});

Route::prefix('projects')->group(function () {
    Route::get('/', 'ProjectController@index')->name('projects.index');
    Route::post('/store', 'ProjectController@store')->name('projects.store');
    Route::delete('/{id}', 'ProjectController@destroy')->name('projects.destroy');
    Route::post('/mark-read', 'ProjectController@markAsRead')->name('projects.markRead');
    Route::get('/users', 'ProjectController@getUsers')->name('projects.users');
});

// Legacy routes
Route::post('save_projects', 'ProjectController@store');
Route::post('delete_project', 'ProjectController@destroy');
Route::post('set_read_project', 'ProjectController@markAsRead');
Route::get('get_users', 'ProjectController@getUsers');


// ------------------- Guest Routes -------------------

// Starter
Route::middleware('guest:starter')->group(function () {
    Route::view('/register_starter', 'auth.register_starter')->name('register_starter');
    Route::view('/login_starter', 'auth.login_starter')->name('login_starter');
    Route::post('/login_starter', 'Auth\LoginController@login_starter');
});

// Admin
Route::middleware('guest:admin')->group(function () {
    Route::view('/login_admin', 'auth.login_admin')->name('login_admin');
    Route::post('/login_admin', 'Auth\LoginController@login_admin');
});

// Manager
Route::middleware('guest:manager')->group(function () {
    Route::view('/login_manager', 'auth.login_manager')->name('login_manager');
    Route::post('/login_manager', 'Auth\LoginController@login_manager');
});

// Office Manager
Route::middleware('guest:officemanager')->group(function () {
    Route::view('/login_officemanager', 'auth.login_officemanager')->name('login_officemanager');
    Route::post('/login_officemanager', 'Auth\LoginController@login_officemanager');
});

// Affiliator
Route::middleware('guest:affiliator')->group(function () {
    Route::view('/login_affiliator', 'auth.login_affiliator')->name('login_affiliator');
    Route::post('/login_affiliator', 'Auth\LoginController@login_affiliator');
});

// Teamleader
Route::middleware('guest:teamleader')->group(function () {
    Route::view('/login_teamleader', 'auth.login_teamleader')->name('login_teamleader');
    Route::post('/login_teamleader', 'Auth\LoginController@login_teamleader');
});

// Caposala
Route::middleware('guest:caposala')->group(function () {
    Route::view('/login_caposala', 'auth.login_caposala')->name('login_caposala');
    Route::post('/login_caposala', 'Auth\LoginController@login_caposala');
});

// Customer Service
Route::middleware('guest:customer_service')->group(function () {
    Route::view('/login_customer_service', 'auth.login_customer_service')->name('login_customer_service');
    Route::post('/login_customer_service', 'Auth\LoginController@login_customer_service');
});


// ------------------- Authenticated Routes -------------------

// Example: Starter authenticated routes
Route::middleware('auth:starter')->prefix('starter')->group(function () {
    Route::get('/', 'HomeController@index_guard');
    Route::get('/home', 'HomeController@index_guard');
    Route::get('/personal_info', 'HomeController@personal_info')->name('personal_info');
    Route::get('/deposit', 'HomeController@deposit')->name('deposit');
    Route::get('/withdraw', 'HomeController@withdraw')->name('withdraw');
    // Add other starter routes here...
});

// Office Manager, Manager, Admin, Affiliator, Teamleader, Caposala, CustomerService
// ... mund të vazhdojnë njësoj me middleware dhe prefix si më sipër

