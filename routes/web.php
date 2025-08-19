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

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index')->name('home');

// Project routes
Route::middleware('auth')->group(function () {
    Route::resource('projects', 'ProjectController')->except(['show', 'create', 'edit']);
    Route::get('projects/stats', 'ProjectController@stats')->name('projects.stats');
});

// Project Management Routes
Route::prefix('projects')->group(function () {
    Route::get('/', 'ProjectController@index')->name('projects.index');
    Route::post('/store', 'ProjectController@store')->name('projects.store');
    Route::delete('/{id}', 'ProjectController@destroy')->name('projects.destroy');
    Route::post('/mark-read', 'ProjectController@markAsRead')->name('projects.markRead');
    Route::get('/users', 'ProjectController@getUsers')->name('projects.users');
});

// Legacy routes for compatibility
Route::post('save_projects', 'ProjectController@store');
Route::post('delete_project', 'ProjectController@destroy');
Route::post('set_read_project', 'ProjectController@markAsRead');
Route::get('get_users', 'ProjectController@getUsers');


Route::get('/select', function () {
    return view('user.select');
})->name('login_select');









     //////////   GUEST STARTER    /////////////


Route::middleware('guest:starter')->group(function () {
    Route::get('/register_starter', function () {
        return view('auth.register_starter');
    })->name('register_starter');

    Route::get('/login_starter', function () {
        return view('auth.login_starter');
    })->name('login_starter');

    Route::post('/login_starter', 'Auth\LoginController@login_starter');
});


    //////////   GUEST STARTER    /////////////










    //////////   GUEST ADMIN    /////////////


Route::middleware('guest:admin')->group(function () {

    Route::get('/login_admin', function (Request $request) {
//        $ip = $request->ip();
//
//        if ($ip != '') {
//            return redirect('/');
//        }
//        else
        return view('auth.login_admin');
    })->name('login_admin');

    Route::post('/login_admin', 'Auth\LoginController@login_admin');

});

Route::middleware('guest:manager')->group(function () {

    Route::get('/login_manager', function () {
        return view('auth.login_manager');
    })->name('login_manager');

    Route::post('/login_manager', 'Auth\LoginController@login_manager');

});



    //////////   GUEST ADMIN    /////////////












    //////////   GUEST OFFICEMANAGER    /////////////


Route::middleware('guest:officemanager')->group(function () {

    Route::get('/login_officemanager', function () {
        return view('auth.login_officemanager');
    })->name('login_officemanager');

    Route::post('/login_officemanager', 'Auth\LoginController@login_officemanager');

});



    //////////   GUEST OFFICEMANAGER    /////////////









    //////////   GUEST AFFILIATOR    /////////////


Route::middleware('guest:affiliator')->group(function () {

    Route::get('/login_affiliator', function () {
        return view('auth.login_affiliator');
    })->name('login_affiliator');

    Route::post('/login_affiliator', 'Auth\LoginController@login_affiliator');

});


    //////////   GUEST AFFILIATOR    /////////////









    //////////   GUEST TEAMLEADER    /////////////


Route::middleware('guest:teamleader')->group(function () {

    Route::get('/login_teamleader', function () {
        return view('auth.login_teamleader');
    })->name('login_teamleader');

    Route::post('/login_teamleader', 'Auth\LoginController@login_teamleader');

});



    //////////   GUEST TEAMLEADER    /////////////










    //////////   GUEST CAPOSALA    /////////////


Route::middleware('guest:caposala')->group(function () {

     Route::get('/login_caposala', function () {
        return view('auth.login_caposala');
    })->name('login_caposala');

    Route::post('/login_caposala', 'Auth\LoginController@login_caposala');

});



    //////////   GUEST CAPOSALA    /////////////










    //////////   GUEST CUSTOMER SERVICE    /////////////


Route::middleware('guest:customer_service')->group(function () {

    Route::get('/login_customer_service', function () {
        return view('auth.login_customer_service');
    })->name('login_customer_service');

    Route::post('/login_customer_service', 'Auth\LoginController@login_customer_service');

});


    //////////   GUEST CUSTOMER SERVICE    /////////////










    //////////   AUTH STARTER    /////////////


Route::middleware('auth:starter')->prefix('starter')->group(function () {
    Route::get('lang/{locale}', 'LocalizationController@index');

    Route::get('/', 'HomeController@index_guard');
    Route::get('/home', 'HomeController@index_guard');
    Route::get('/personal_info', 'HomeController@personal_info')->name('personal_info');
    Route::get('/deposit', 'HomeController@deposit')->name('deposit');
    Route::get('client/{id}', 'UserController@show');
    Route::get('/my_withdraws', 'WithdrawController@index');
    Route::get('/withdraw', 'HomeController@withdraw')->name('withdraw');
    Route::get('/commodities', 'HomeController@commodities')->name('commodities');
    Route::get('/porta_amico', 'HomeController@porta_amico')->name('porta_amico');
    Route::get('/spin', 'HomeController@spin')->name('spin');
    Route::get('/projects', 'UserController@projects');
    Route::post('getuserwithdraws', 'WithdrawController@getuserwithdraws');
    Route::get('online', 'UserController@userOnlineStatus');
    Route::post('/getbankdetails', 'BankDetailsController@GetBankDetails');
    Route::get('/email_alert', 'EmailAlertController@index');


    Route::get('/deposit_bank', function () {
        return view('user.deposit_bank');
    });

    Route::get('/markets', function () {
        return view('user.markets_black_panther');
    });

    Route::get('/chart', function () {
        return view('user.chart');
    });

    Route::get('/withdraws', function () {
        return view('user.withdraws');
    });


    Route::get('/forex_rates', function () {
        return view('user.forex_rates');
    });

    Route::get('/crypto_market', function () {
        return view('user.crypto_market');
    });

    Route::get('/market_data', function () {
        return view('user.market_data');
    });


    Route::get('/economic_calendar', function () {
        return view('user.economic_calendar');
    });

    Route::get('/live_data', function () {
        return view('user.live_data');
    });

    Route::get('/select_deposit', function () {
        return view('user.select_deposit');
    });


    Route::get('/signals', function () {
        return view('user.signals');
    });


});



    //////////   AUTH STARTER    /////////////











    //////////   AUTH OFFICEMANAGER    /////////////


Route::middleware('auth:officemanager')->prefix('officemanager')->group(function () {



    Route::get('lang/{locale}', 'LocalizationController@index');


    Route::get('/', 'ManagerController@index_guard_overall');


    Route::get('/home', 'ManagerController@index_guard_overall')->name('officemanager_home');;



//     USERS
    Route::get('/users', 'UserController@users');
//     USERS


//    CLIENTS
    Route::get('/clients', 'UserController@clients');
//    CLIENTS  


//      APPROVE USERS
    Route::get('/approve_users', 'UserController@approve_users');
//     APPROVE USERS



//     EXCLIENTS
    Route::get('/exclients', 'UserController@exclients');
//     EXCLIENTS



//     CALENDAR
    Route::get('/calendar', 'AdminController@calendar');
//     CALENDAR 



//     LEADS
Route::get('/leads', 'UserController@leads');
//     LEADS



});


    ///////////  AUTH OFFICEMANAGER   /////////////







   ///////////      AUTH CAPOSALA    //////////////     




Route::middleware('auth:caposala')->prefix('caposala')->group(function () {



    Route::get('lang/{locale}', 'LocalizationController@index');


    Route::get('/', 'ManagerController@index_guard_overall');


    Route::get('/home', 'ManagerController@index_guard_overall')->name('caposala_home');



//     USERS
    Route::get('/users', 'UserController@users');
//     USERS


//    CLIENTS
    Route::get('/clients', 'UserController@clients');
//    CLIENTS  



//      APPROVE USERS
    Route::get('/approve_users', 'UserController@approve_users');
//     APPROVE USERS



//     EXCLIENTS
    Route::get('/exclients', 'UserController@exclients');
//     EXCLIENTS



//     CALENDAR
    Route::get('/calendar', 'AdminController@calendar');
//     CALENDAR 



//     LEADS
Route::get('/leads', 'UserController@leads');
//     LEADS


//     VIEW USER PROFILE
Route::get('lead_profile/{id}', 'UserController@lead_profile');
//     VIEW USER PROFILE



});






 ///////////      AUTH CAPOSALA    //////////////


























    //////////   AUTH AFFILIATOR    /////////////


Route::middleware('auth:affiliator')->prefix('affiliator')->group(function () {



    Route::get('lang/{locale}', 'LocalizationController@index');


    Route::get('/', 'AffiliatorController@index_guard');


    Route::get('/home', 'AffiliatorController@index_guard')->name('affiliator_home');;


    //     LEADS
    Route::get('/leads', 'AffiliatorController@leads');
    Route::any('/getLeads', 'AffiliatorController@getLeads')->name('leads.affiliator');
    //     LEADS


    //     VIEW USER PROFILE
    Route::get('lead_profile/{id}', 'AffiliatorController@lead_profile');
    //     VIEW USER PROFILE


});


    ///////////  AUTH AFFILIATOR   /////////////















    //////////   AUTH TEAMLEADER    /////////////


    Route::middleware('auth:teamleader')->prefix('teamleader')->group(function () {



        Route::get('lang/{locale}', 'LocalizationController@index');


        Route::get('/', 'ManagerController@index_guard_overall');


        Route::get('/home', 'ManagerController@index_guard_overall')->name('teamleader_home');;



    //     USERS
        Route::get('/users', 'UserController@users');
    //     USERS


    //    CLIENTS
        Route::get('/clients', 'UserController@clients');
    //    CLIENTS  


    //      APPROVE USERS
        Route::get('/approve_users', 'UserController@approve_users');
    //     APPROVE USERS



    //     EXCLIENTS
        Route::get('/exclients', 'UserController@exclients');
    //     EXCLIENTS



    //     CALENDAR
        Route::get('/calendar', 'AdminController@calendar');
    //     CALENDAR 



    //     LEADS
    Route::get('/leads', 'UserController@leads');
    //     LEADS



    });












       //////////   AUTH MANAGER    /////////////


Route::middleware('auth:manager')->prefix('manager')->group(function () {
    Route::get('lang/{locale}', 'LocalizationController@index');

    Route::get('/', 'ManagerController@index_guard');


    Route::get('/home', 'HomeController@index_guard')->name('manager_home');


    Route::get('/get_manager_users', 'UserController@getManagerUsers');






//      MANAGER SEND & SHOW FORM
    Route::get('manager_form', 'ManagerController@manager_form');
    Route::get('get_manager_form', 'ManagerController@get_manager_form');
    Route::get('/managers_form', 'UserController@managers_form');
    Route::post('/post_form_data', 'ManagerController@post_form_data');
    Route::post('/find_manager_form','ManagerController@find_manager_form');

//      MANAGER SEND & SHOW FORM



//      APPROVE USERS
    Route::get('/approve_users', 'ManagerController@approve_users');
    Route::any('/getUsersAll', 'ManagerController@ApproveUsers')->name('manager_approve');
//      APPROVE USERS




//     USERS
    Route::get('/users', 'ManagerController@users');
    Route::any('/getUsersWithoutDeposit', 'ManagerController@getUsersWithoutDeposit')->name('manager.nodeposit');
//     USERS




//    MANAGER CLIENTS DATATABLE
    Route::get('/clients', 'ManagerController@clients');
    Route::get('/getClients', 'ManagerController@getClients')->name('manager_clients');
//    MANAGER CLIENTS DATATABLE




//    MANAGER PROMO DATATABLE
    Route::get('/promo', 'ManagerController@promo');
    Route::get('/getPromoClients', 'ManagerController@getPromoClients')->name('manager_promo');
//    MANAGER PROMO DATATABLE




//    MANAGER EXCLIENTS DATATABLE
    Route::get('/exclients', 'ManagerController@exclients');
    Route::get('/getExclients', 'ManagerController@getExclients')->name('manager_exclients');
//    MANAGER EXCLIENTS DATATABLE




//     DEPOSIT REQUESTS
    Route::get('/deposit_requests', 'ManagerController@deposit_request');
    Route::any('/getDepositRequests', 'ManagerController@getDepositRequests')->name('manager_deposit_requests');
//     DEPOSIT REQUESTS




//     TRANSACTION LOG
Route::get('/transaction_logs', 'ManagerController@transaction_logs');
Route::any('/getTransactions', 'ManagerController@getTransactions')->name('mantransactions.datatable');
//     TRANSACTION LOG




//     SMS LOG
    Route::get('/sms_log', 'SmsController@sms_log');
//     SMS LOG




//     GET SMS LOG
    Route::any('/get_sms_log/{id}', 'SmsController@get_sms_log');
//     GET SMS LOG




//     LEADS
    Route::get('/leads', 'ManagerController@leads');
    Route::any('/getLeads', 'ManagerController@getLeads')->name('leads.manager');
//     LEADS




//     VIEW USER PROFILE
    Route::get('lead_profile/{id}', 'UserController@lead_profile');
//     VIEW USER PROFILE



//     CALENDAR
    Route::get('/calendar', 'ManagerController@calendar');
//     CALENDAR



    Route::get('/personal_info', 'HomeController@personal_info')->name('personal_info');

    Route::get('/approve_clients', 'ManagerController@approve_clients');

    Route::get('/withdraws', 'ManagerController@withdraws_list');

    Route::get('/closure_requests', 'ManagerController@closure_requests');

    Route::get('/exclients', 'ManagerController@exclients');

    Route::get('client/{id}', 'UserController@show');

    Route::get('logine_user/{id}', 'ManagerController@login_user');



    Route::get('/signals', function () {return view('user.signals');});


    Route::get('/email_alert', 'EmailAlertController@index');


    Route::get('online', 'UserController@userOnlineStatus');



    Route::get('/economic_calendar', function () {return view('user.economic_calendar');});

});





            //////////   AUTH MANAGER    /////////////















            //////////   AUTH CUSTOMER SERVICE    /////////////


Route::middleware('auth:customer_service')->prefix('customer_service')->group(function () {
    Route::get('lang/{locale}', 'LocalizationController@index');
    Route::get('/', 'CustomerServiceController@index_guard')->name('customer_home');
    Route::get('/approve_clients_customer', 'CustomerServiceController@approve_clients_customer');

});


           //////////   AUTH CUSTOMER SERVICE    /////////////










          //////////   AUTH ADMIN    /////////////


Route::middleware('auth:admin')->prefix('admin')->group(function () {

    Route::get('lang/{locale}', 'LocalizationController@index');


    Route::get('/', 'AdminController@index')->name('admin_home');

    Route::get('/calendar', 'AdminController@calendar');
    Route::get('/transactions', 'AdminController@transactions_logs')->name('transactions');
    Route::get('/create_user', 'AdminController@create_user');
    Route::get('/home_dashboard', 'adminController@home_dashboard');
    Route::get('/withdraws', 'AdminController@withdraws_list');
    Route::get('/email_alerts', 'EmailAlertController@adminEmails');
    Route::get('accounts', 'AccountController@index');
    Route::get('/approve_managers', 'UserController@approve_managers');
    Route::get('/deposits', 'DepositController@index');
    Route::get('/get_data/{param1}/{param2?}/{param3?}', 'ApiController@getData');
    Route::get('getUsers', 'ApiController@getUsers');
    Route::get('/projects', 'UserController@projects');
    Route::get('/get_user_mt4/{mt4}', 'EmailAlertController@getUserMT4');


//     EXPORT MANAGER FORMS
    Route::get('/tasks/{id}', 'AdminController@exportCsv');
//     EXPORT MANAGER FORMS


//    USERS
    Route::get('/users', 'UserController@users');
//    USERS  



//      APPROVE USERS
    Route::get('/approve_users', 'UserController@approve_users');
//     APPROVE USERS




//     EXCLIENTS
    Route::get('/exclients', 'UserController@exclients');
//     EXCLIENTS





//     RECYCLE
    Route::get('/recycle', 'UserController@recycle');
    Route::any('/getRecycle', 'UserController@getRecycle')->name('recycle.datatable');
//     RECYCLE





//     CLIENTS
    Route::get('/clients', 'UserController@clients');
//     CLIENTS




//     LEADS
    Route::get('/leads', 'UserController@leads');
//     LEADS




//     TRANSACTION LOG
    Route::get('/transaction_logs', 'AdminController@transaction_logs');
    Route::any('/getTransactions', 'AdminController@getTransactions')->name('transactions.datatable');
//     TRANSACTION LOG




//     COLLATERAL
    Route::get('/collateral', 'CollateralController@collaterals');
    Route::any('/getCollaterals', 'CollateralController@getCollaterals')->name('collaterals.datatable');
//     COLLATERAL



//     DEPOSIT REQUESTS
    Route::get('/deposit_request', 'AdminController@deposit_request');
    Route::any('/getDepositRequests', 'AdminController@getDepositRequests')->name('deposit_requests.datatable');
//     DEPOSIT REQUESTS




//     SMS LOG
    Route::get('/sms_log', 'SmsController@sms_log');
//     SMS LOG



//    DELETE COMMENT
    Route::post('delete_comment', 'UserController@delete_comment');
//    DELETE COMMENT




//    GET COMMENT
    Route::post('get_comment', 'UserController@get_comment');
//    GET COMMENT




//    UPDATE COMMENT
    Route::post('update_comment', 'UserController@update_comment');
//    UPDATE COMMENT




//     GET SMS LOG
    Route::any('/get_sms_log/{id}', 'SmsController@get_sms_log');
//     GET SMS LOG




// //     VIEW CLIENT PROFILE
Route::get('client/{id}', 'UserController@show');
// //     VIEW CLIENT PROFILE





// //     VIEW MANAGER PROFILE
Route::get('manager/{id}', 'UserController@showmanager');
// //     VIEW MANAGER PROFILE







//    CHANGE USERS/LEADS STATUS MULTI
    Route::post('change_status_multi/', 'AdminController@change_status_multi');
//    CHANGE USERS/LEADS STATUS MULTI






//    CREATE NEW MANAGER
Route::any('create_new_manager/', 'AdminController@create_new_manager');
//    CREATE NEW MANAGER




//    CREATE NEW MANAGER
Route::any('createLead/', 'AdminController@createLead');
//    CREATE NEW MANAGER




//    DELETE MULTI USERS/LEADS
    Route::post('delete_multi/', 'AdminController@delete_multi');
//    DELETE MULTI USERS/LEADS




//     STATUSES
    Route::get('/statuses', 'AdminController@statuses');
    Route::get('/get_statuses', 'AdminController@get_statuses');
    Route::post('create_status','AdminController@create_status');
    Route::post('update_status','AdminController@update_status');
    Route::post('get_status','AdminController@get_status');
    Route::post('delete_status','AdminController@delete_status');
//     STATUSES



//     ALLOWED IP
Route::get('/allowedip', 'AdminController@allowedip');
Route::get('/get_allowedip', 'AdminController@get_allowedip');
Route::post('create_allowedip','AdminController@create_allowedip');
Route::post('update_allowedip','AdminController@update_allowedip');
Route::post('delete_allowedip','AdminController@delete_allowedip');
//     ALLOWED IP




//     ALLOWED IP
Route::get('/allowedpromocode', 'AdminController@allowedpromocode');
Route::get('/get_allowedpromocode', 'AdminController@get_allowedpromocode');
Route::post('create_allowedpromocode','AdminController@create_allowedpromocode');
Route::post('delete_allowedpromocode','AdminController@delete_allowedpromocode');
//     ALLOWED IP






//     ALLOWED PROMOCODE
Route::get('/desks', 'AdminController@desks');
Route::get('/get_desks', 'AdminController@get_desks');
Route::post('create_desk','AdminController@create_desk');
Route::post('delete_desk','AdminController@delete_desk');
//     ALLOWED PROMOCODE





//     UPLOADS
    Route::get('/uploads', 'AdminController@uploads');
    Route::post('/get_uploads', 'AdminController@get_uploads');
    Route::post('find_uploads','AdminController@find_uploads');
    Route::post('delete_uploads','AdminController@delete_uploads');
//    UPLOADS




//    GET MANAGERS FORM
    Route::get('/managers_form', 'UserController@managers_form');
    Route::post('/get_managers_form', 'AdminController@get_managers_form');
    Route::post('/find_manager_form','AdminController@find_manager_form');
//    GET MANAGERS FORM




//   GET EMAILS ADMIN
    Route::get('emails/', 'EmailAlertController@emailsView');
    Route::get('get_emails_admin/', 'EmailAlertController@getEmailsAdmin');
//   GET EMAILS ADMIN





//   CHANGE TEAMLEADER
Route::post('/change_teamleader', 'AdminController@change_teamleader');
//   CHANGE TEAMLEADER





//   CHANGE TEAMLEADER
Route::get('/get_teamleaders', 'AdminController@get_teamleaders');
//   CHANGE TEAMLEADER




//   GET TEAMLEADER
Route::get('/getTL/{id}', 'AccountController@getTL');
//   GET TEAMLEADER

});



           //////////   AUTH ADMIN    /////////////













         //////////  ROUTES WITHOUT MIDDLEWARE ////////////



//       IMPORT CSV LISTS
    Route::get('/import_csv', 'ImportController@getImport')->name('import');
    Route::post('/import_parse', 'ImportController@parseImport')->name('import_parse');
    Route::post('/import_process', 'ImportController@processImport')->name('import_process');
//       IMPORT CSV LISTS





//     VIEW USER PROFILE
Route::get('lead_profile/{id}', 'UserController@lead_profile');
//     VIEW USER PROFILE




//     CHANGE STATUS
Route::get('/get_templates', 'EmailAlertController@getUserTemplates');
//     CHANGE STATUS



//     CHANGE STATUS
Route::post('/change_status', 'UserController@change_status');
//     CHANGE STATUS




//     CREATE NOTE
Route::post('/create_note', 'UserController@create_note');
//     CREATE NOTE




//     CREATE COMMENT
Route::post('/create_comment', 'UserController@create_comment');
//     CREATE COMMENT




//     GET USER PHONE
Route::post('/get_phone', 'UserController@get_phone');
//     GET USER PHONE





///     GET COMMENTS
Route::any('/get_comments', 'UserController@get_comments');
//      GET COMMENTS





///     GET COMMENTS
Route::any('/get_calendar_events', 'UserController@get_calendar_events');
Route::any('/get_leads_events', 'UserController@get_leads_events');
//      GET COMMENTS




///     GET LEAD COMMENTS
Route::any('/get_lead_comments', 'UserController@get_lead_comments');
//      GET LEAD COMMENTS




//        CREATE CALENDAR EVENT
Route::post('/save_event', 'CalendarController@store');
//        CREATE CALENDAR EVENT




//         GET CALENDAR EVENTS
Route::get('/get_user_events', 'CalendarController@get_user_events');
//         GET CALENDAR EVENTS




//         GET CALENDAR EVENTS
Route::get('/get_all_events', 'CalendarController@get_all_events');
//         GET CALENDAR EVENTS




//         GET CALENDAR REMINDERS
Route::get('/get_reminder', 'CalendarController@get_reminder');
//         GET CALENDAR REMINDERS




//         GET SPECIFIC CALENDAR EVENT
Route::post('/get_event', 'CalendarController@get_event');
Route::post('/get_event_json', 'CalendarController@get_event_json');
//         GET SPECIFIC CALENDAR EVENT




//         SET SEEN CALENDAR EVENT
Route::post('/set_seen_event', 'CalendarController@set_seen_event');
//         SET SEEN CALENDAR EVENT




//         UPDATE CALENDAR EVENT
Route::post('/update_event', 'CalendarController@update_event');
//         UPDATE CALENDAR EVENT




//     SET CALENDAR EVENT COMPLETED
Route::post('/set_event_completed', 'CalendarController@set_event_completed');
//     SET CALENDAR EVENT COMPLETED




//      DELETE CALENDAR EVENT
Route::post('/delete_event', 'CalendarController@delete_event');
//      DELETE CALENDAR EVENT




//     CREATE CALENDAR EVENT FROM USER PROFILE
Route::post('/add_user_event', 'CalendarController@add_user_event');
//     CREATE CALENDAR EVENT FROM USER PROFILE




//     SEND SMS
Route::post('/sendMessage', 'SmsController@sendSms');
//     SEND SMS




//     RECEIVE SMS
Route::post('/incoming/twilio', 'SmsController@ReceiveSms');
Route::post('/incoming/sendgrid', 'SmsController@receiveEmail');
//     RECEIVE SMS




//        DELETE USER & LEAD
Route::post('/delete_user', 'AdminController@delete_user');
Route::post('/delete_agent', 'AdminController@delete_agent');
Route::post('/delete_lead', 'AdminController@delete_lead');
//        DELETE USER & LEAD



//     USERS
Route::any('/getUsersWithoutDeposit', 'UserController@getUsersWithoutDeposit')->name('nodeposit.datatable');
//     USERS




//     CLIENTS
Route::any('/getClients', 'UserController@getClients')->name('clients.datatable');
//     CLIENTS


//     APPROVE CLIENTS
    Route::any('/getUsersAll', 'UserController@ApproveUsers')->name('users.datatable');
//     APPROVE CLIENTS



//    EXCLIENTS
Route::any('/getExclients', 'UserController@getExclients')->name('exclients.datatable');
//    EXCLIENTS



//     LEADS
Route::any('/getLeads', 'UserController@getLeads')->name('leads.datatable');
//     LEADS



//    GET MANAGERS TO JSON
Route::get('get_managers', 'UserController@get_managers');
//    GET MANAGERS TO JSON




//    ASSIGN MULTI USERS/LEADS
Route::post('assign_multi/', 'AdminController@assign_multi');
//    ASSIGN MULTI USERS/LEADS



//    ASSIGN MULTI USERS/LEADS
Route::post('delete_multi_comments/', 'AdminController@delete_multi_comments');
//    ASSIGN MULTI USERS/LEADS



//     VIEW USER PROFILE
Route::get('user_profile/{id}', 'UserController@user_profile');
//     VIEW USER PROFILE





//     AUTOLOGIN
Route::any('autologin', 'PaymentsController@autologin');
//     AUTOLOGIN


//     AUTOLOGIN
Route::any('manager_autologin', 'PaymentsController@manager_autologin');
//     AUTOLOGIN




///     GET LEAD COMMENTS
Route::any('/GetFCardDetails', 'BankDetailsController@GetFCardDetails');
Route::any('/GetJCardDetails', 'BankDetailsController@GetJCardDetails');
Route::any('/GetSCardDetails', 'BankDetailsController@GetSCardDetails');
//      GET LEAD COMMENTS



Route::post('/send-notification', 'NotificationController@sendLeadsNotification');



Route::get('reminder_popup/{id}', 'ManagerController@reminder_popup');

Route::post('user/update', 'UserController@update');
Route::get('login_user/{id}', 'AdminController@login_user');
Route::get('/get_users', 'UserController@getUsers');
Route::post('/updateUser', 'AdminController@updateUser');
Route::post('/updateManager', 'AdminController@updateManager');
Route::post('/store_user', 'AdminController@store_user');
Route::post('/delete_request', 'AdminController@delete_request');
Route::post('/user_status', 'HomeController@user_status');
Route::any('/edit_permission', 'HomeController@edit_permission');
Route::post('/manager_leverage', 'HomeController@manager_leverage');
Route::post('/view_password', 'HomeController@view_password');
Route::post('/user_real', 'AdminController@user_real');
Route::post('change_password', 'UserController@change_password');
Route::post('mt4_pass_as_account', 'AdminController@mt4PassAsAccount');
Route::post('/change_account', 'AdminController@changeAccountType');
Route::post('/change_leverage', 'AdminController@changeLeverage');
Route::get('get_accounts/{id}', 'AccountController@getAccounts');
Route::get('get_all_accounts/', 'AdminController@getAllAccounts');
Route::get('deposit/success', 'PaymentsController@returnSuccess');
Route::post('/save_bank_deposit', 'AdminController@saveBankDeposit');
Route::post('/save_bank_deposit_new', 'AdminController@saveBankDepositNew');
Route::post('deposit/store', 'PaymentsController@purchase');
Route::post('deposit_bank/store', 'PaymentsController@saveBank');
Route::post('/save_collateral', 'CollateralController@store');
Route::post('/save_collateral_new', 'CollateralController@storeNew');
Route::post('/set_read_project', 'ProjectController@markAsRead');
Route::post('/save_credit', 'CreditController@store');
Route::post('/withdraw', 'DepositController@storeWithdraw');
Route::post('/withdraw_status', 'AdminController@withdraw_status');
Route::post('/set_closure', 'AdminController@set_closure');
Route::post('/delete_withdraw', 'AdminController@delete_withdraw');
Route::post('/delete_transaction_log', 'TransactionLogController@delete_transaction');
Route::post('/delete_credit', 'CollateralController@delete_credit');
Route::post('/delete_collateral', 'CollateralController@delete_collateral');
Route::get('get_withdraws/', 'WithdrawController@getWithdraws');
Route::get('files/{id}', 'UserController@getFile');
Route::get('get_alerts/', 'EmailAlertController@getAlertsUser');
Route::get('get_alerts_admin/', 'EmailAlertController@getAlertsAdmin');

Route::post('new_email/', 'EmailAlertController@store');
Route::post('spin_inbox/', 'EmailAlertController@spin_inbox');
Route::post('send_email/', 'UserController@send_email');
Route::post('send_email_fields/', 'UserController@send_email_fields');
Route::post('send_multi_email/', 'UserController@send_multi_email');
Route::post('send_registration_email/', 'UserController@send_registration_email');
Route::post('deposits_chart/', 'HomeController@deposits_chart');
Route::post('todo_store/', 'TodoController@store');
Route::post('todo_destroy/', 'TodoController@destroy');
Route::post('template_store/', 'EmailAlertController@template_store');
Route::post('template_destroy/', 'EmailAlertController@template_destroy');
Route::post('update_template/', 'EmailAlertController@update_template');
Route::post('drop_files', 'UserController@drop_files');
Route::post('/edituser_permission', 'HomeController@edituser_permission');
Route::post('/login_manager_test', 'ManagerController@login_manager_test');
Route::post('user/save_spin', 'SpinController@store');
Route::post('set_read/', 'EmailAlertController@setRead');
Route::get('/update_geo_ip', 'AdminController@update_geo_ip');
Route::get('todos/', 'TodoController@index');
Route::get('webtrader/', 'UserController@webtrader');
Route::post('/create_mt4', 'AdminController@create_mt4');
Route::post('/operations_data/', 'OperationController@operations_data');
Route::post('/export_excel/', 'OperationController@export_excel');
Route::post('/purchase_scuderia/', 'PaymentsController@purchase_scuderia');



Route::group(['prefix'=>'logs'],function(){
    Route::get('/', ['as'=>'log-viewer::dashboard','uses'=>'\Arcanedev\LogViewer\Http\Controllers\LogViewerController@index']);
    Route::get('/logs', ['as'=>'log-viewer::logs.list','uses'=>'\Arcanedev\LogViewer\Http\Controllers\LogViewerController@listLogs']);
    Route::delete('/logs/delete', ['as'=>'log-viewer::logs.delete','uses'=>'\Arcanedev\LogViewer\Http\Controllers\LogViewerController@delete']);
    Route::get('/logs/{date}', ['as'=>'log-viewer::logs.show','uses'=>'\Arcanedev\LogViewer\Http\Controllers\LogViewerController@show']);
    Route::get('/logs/{date}/download', ['as'=>'log-viewer::logs.download','uses'=>'\Arcanedev\LogViewer\Http\Controllers\LogViewerController@download']);
    Route::get('/logs/{date}/{level}', ['as'=>'log-viewer::logs.filter','uses'=>'\Arcanedev\LogViewer\Http\Controllers\LogViewerController@showByLevel']);
});

//});