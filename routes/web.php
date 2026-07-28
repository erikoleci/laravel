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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index_guard']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index_guard'])->name('home');


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


// ------------------- Admin Routes -------------------
Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('index');
    Route::get('/home_dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('home_dashboard');

    Route::get('/login_user/{id}', [App\Http\Controllers\AdminController::class, 'login_user'])->name('login_user');
    Route::get('/transactions_logs', [App\Http\Controllers\AdminController::class, 'transactions_logs'])->name('transactions_logs');
    Route::get('/deposits', [App\Http\Controllers\AdminController::class, 'deposits'])->name('deposits');
    Route::get('/totalprojects', [App\Http\Controllers\AdminController::class, 'totalprojects'])->name('totalprojects');
    Route::get('/totalwithdraws', [App\Http\Controllers\AdminController::class, 'totalwithdraws'])->name('totalwithdraws');
    Route::get('/withdraws_list', [App\Http\Controllers\AdminController::class, 'withdraws_list'])->name('withdraws_list');
    Route::get('/surveys_list', [App\Http\Controllers\AdminController::class, 'surveys_list'])->name('surveys_list');
    Route::get('/deposit_requests', [App\Http\Controllers\AdminController::class, 'deposit_requests'])->name('deposit_requests');
    Route::get('/accounts', [App\Http\Controllers\AdminController::class, 'getAllAccounts'])->name('accounts');
    Route::get('/projects', [App\Http\Controllers\AdminController::class, 'projects'])->name('projects');
    Route::get('/uploads', [App\Http\Controllers\AdminController::class, 'uploads'])->name('uploads');
    Route::get('/uploads/list', [App\Http\Controllers\AdminController::class, 'get_uploads'])->name('uploads.list');
    Route::get('/uploads/find', [App\Http\Controllers\AdminController::class, 'find_uploads'])->name('uploads.find');
    Route::get('/statuses', [App\Http\Controllers\AdminController::class, 'statuses'])->name('statuses');
    Route::get('/statuses/list', [App\Http\Controllers\AdminController::class, 'get_statuses'])->name('statuses.list');
    Route::get('/statuses/{id}', [App\Http\Controllers\AdminController::class, 'get_status'])->name('statuses.show');
    Route::get('/allowedip', [App\Http\Controllers\AdminController::class, 'allowedip'])->name('allowedip');
    Route::get('/allowedip/list', [App\Http\Controllers\AdminController::class, 'get_allowedip'])->name('allowedip.list');
    Route::get('/desks', [App\Http\Controllers\AdminController::class, 'desks'])->name('desks');
    Route::get('/desks/list', [App\Http\Controllers\AdminController::class, 'get_desks'])->name('desks.list');
    Route::get('/allowedpromocode', [App\Http\Controllers\AdminController::class, 'allowedpromocode'])->name('allowedpromocode');
    Route::get('/allowedpromocode/list', [App\Http\Controllers\AdminController::class, 'get_allowedpromocode'])->name('allowedpromocode.list');
    Route::get('/create_user', [App\Http\Controllers\AdminController::class, 'create_user'])->name('create_user');
    Route::get('/transaction_logs', [App\Http\Controllers\AdminController::class, 'transaction_logs'])->name('transaction_logs');
    Route::get('/transactions', [App\Http\Controllers\AdminController::class, 'getTransactions'])->name('transactions');
    Route::get('/deposit_request', [App\Http\Controllers\AdminController::class, 'deposit_request'])->name('deposit_request');
    Route::get('/deposit_request/list', [App\Http\Controllers\AdminController::class, 'getDepositRequests'])->name('deposit_request.list');
    Route::get('/calendar', [App\Http\Controllers\AdminController::class, 'calendar'])->name('calendar');
    Route::get('/managers_form', [App\Http\Controllers\AdminController::class, 'get_managers_form'])->name('managers_form');
    Route::get('/managers_form/find', [App\Http\Controllers\AdminController::class, 'find_manager_form'])->name('managers_form.find');
    Route::get('/users/{id}', [App\Http\Controllers\AdminController::class, 'show'])->name('users.show');
    Route::get('/users/{id}/edit', [App\Http\Controllers\AdminController::class, 'edit'])->name('users.edit');
    Route::get('/users/{id}/export', [App\Http\Controllers\AdminController::class, 'exportCsv'])->name('users.export');

    // Mutations
    Route::post('/assign_multi', [App\Http\Controllers\AdminController::class, 'assign_multi'])->name('assign_multi');
    Route::post('/delete_multi_comments', [App\Http\Controllers\AdminController::class, 'delete_multi_comments'])->name('delete_multi_comments');
    Route::post('/change_status_multi', [App\Http\Controllers\AdminController::class, 'change_status_multi'])->name('change_status_multi');
    Route::post('/delete_multi', [App\Http\Controllers\AdminController::class, 'delete_multi'])->name('delete_multi');
    Route::post('/withdraw_status', [App\Http\Controllers\AdminController::class, 'withdraw_status'])->name('withdraw_status');
    Route::post('/set_closure', [App\Http\Controllers\AdminController::class, 'set_closure'])->name('set_closure');
    Route::post('/user_status', [App\Http\Controllers\AdminController::class, 'user_status'])->name('user_status');
    Route::post('/user_real', [App\Http\Controllers\AdminController::class, 'user_real'])->name('user_real');
    Route::post('/change_teamleader', [App\Http\Controllers\AdminController::class, 'change_teamleader'])->name('change_teamleader');
    Route::post('/get_teamleaders', [App\Http\Controllers\AdminController::class, 'get_teamleaders'])->name('get_teamleaders');
    Route::post('/user_formation', [App\Http\Controllers\AdminController::class, 'user_formation'])->name('user_formation');
    Route::post('/save_projects', [App\Http\Controllers\AdminController::class, 'save_projects'])->name('save_projects');
    Route::post('/create_new_manager', [App\Http\Controllers\AdminController::class, 'create_new_manager'])->name('create_new_manager');
    Route::post('/create_lead', [App\Http\Controllers\AdminController::class, 'createLead'])->name('create_lead');
    Route::post('/save_bank_deposit', [App\Http\Controllers\AdminController::class, 'saveBankDeposit'])->name('save_bank_deposit');
    Route::post('/save_bank_deposit_new', [App\Http\Controllers\AdminController::class, 'saveBankDepositNew'])->name('save_bank_deposit_new');
    Route::post('/check_deposit', [App\Http\Controllers\AdminController::class, 'checkDeposit'])->name('check_deposit');
    Route::post('/delete_uploads', [App\Http\Controllers\AdminController::class, 'delete_uploads'])->name('delete_uploads');
    Route::post('/create_status', [App\Http\Controllers\AdminController::class, 'create_status'])->name('create_status');
    Route::post('/update_status', [App\Http\Controllers\AdminController::class, 'update_status'])->name('update_status');
    Route::post('/delete_status', [App\Http\Controllers\AdminController::class, 'delete_status'])->name('delete_status');
    Route::post('/create_allowedip', [App\Http\Controllers\AdminController::class, 'create_allowedip'])->name('create_allowedip');
    Route::post('/update_allowedip', [App\Http\Controllers\AdminController::class, 'update_allowedip'])->name('update_allowedip');
    Route::post('/delete_allowedip', [App\Http\Controllers\AdminController::class, 'delete_allowedip'])->name('delete_allowedip');
    Route::post('/create_desk', [App\Http\Controllers\AdminController::class, 'create_desk'])->name('create_desk');
    Route::post('/delete_desk', [App\Http\Controllers\AdminController::class, 'delete_desk'])->name('delete_desk');
    Route::post('/create_allowedpromocode', [App\Http\Controllers\AdminController::class, 'create_allowedpromocode'])->name('create_allowedpromocode');
    Route::post('/delete_allowedpromocode', [App\Http\Controllers\AdminController::class, 'delete_allowedpromocode'])->name('delete_allowedpromocode');
    Route::post('/change_account_type', [App\Http\Controllers\AdminController::class, 'changeAccountType'])->name('change_account_type');
    Route::post('/change_leverage', [App\Http\Controllers\AdminController::class, 'changeLeverage'])->name('change_leverage');
    Route::post('/update_user', [App\Http\Controllers\AdminController::class, 'updateUser'])->name('update_user');
    Route::post('/update_manager', [App\Http\Controllers\AdminController::class, 'updateManager'])->name('update_manager');
    Route::post('/mt4_pass_as_account', [App\Http\Controllers\AdminController::class, 'mt4PassAsAccount'])->name('mt4_pass_as_account');
    Route::post('/store_user', [App\Http\Controllers\AdminController::class, 'store_user'])->name('store_user');
    Route::post('/create_mt4', [App\Http\Controllers\AdminController::class, 'create_mt4'])->name('create_mt4');
    Route::post('/delete_user', [App\Http\Controllers\AdminController::class, 'delete_user'])->name('delete_user');
    Route::post('/delete_agent', [App\Http\Controllers\AdminController::class, 'delete_agent'])->name('delete_agent');
    Route::post('/delete_lead', [App\Http\Controllers\AdminController::class, 'delete_lead'])->name('delete_lead');
    Route::post('/delete_request', [App\Http\Controllers\AdminController::class, 'delete_request'])->name('delete_request');
    Route::post('/delete_project', [App\Http\Controllers\AdminController::class, 'delete_project'])->name('delete_project');
    Route::post('/delete_withdraw', [App\Http\Controllers\AdminController::class, 'delete_withdraw'])->name('delete_withdraw');
    Route::post('/update_geo_ip', [App\Http\Controllers\AdminController::class, 'update_geo_ip'])->name('update_geo_ip');
    Route::post('/users', [App\Http\Controllers\AdminController::class, 'store'])->name('users.store');
    Route::put('/users/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('users.destroy');
});

// ------------------- Authenticated Routes -------------------

// Example: Regular customer authenticated routes (registration always logs
// users in via the default 'web' guard, so these must use it too)
Route::middleware('auth')->group(function () {
    Route::get('/personal_info', 'HomeController@personal_info')->name('personal_info');
    Route::get('/deposit', 'HomeController@deposit')->name('deposit');
    Route::get('/withdraw', 'HomeController@withdraw')->name('withdraw');
    Route::get('/withdraws_list', [App\Http\Controllers\WithdrawController::class, 'index'])->name('withdraws_list');
});

// Office Manager, Manager, Admin, Affiliator, Teamleader, Caposala, CustomerService
// ... mund të vazhdojnë njësoj me middleware dhe prefix si më sipër

