<?php

namespace App\Http\Controllers;

use App\Closure;
use App\Collateral;
use App\Credit;
use App\Deposit;
use App\Deposit_request;
use App\FormData;
use App\ImportCsv;
use App\Status;
use App\Survey;
use App\Upload;
use App\Agents;
use App\Transaction_logs;
use App\User;
use App\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Yajra\DataTables\DataTables;

class ManagerController extends Controller
{
    //


    public function __construct()
    {
       
    }


    public function index_guard(){
        if (logged_in()) {

            $statuses = Status::whereNotNull('id')->get();
            return view('manager.exclients')->with(['statuses'=>$statuses]);
        }
    }




    public function index_teamleader()
    {
        if (logged_in()) {

            return redirect(get_guard().'/');

        }
        else {
            return view('auth.login_teamleader');
        }
    }


    public function index_officemanager()
    {
        if (logged_in()) {

            return redirect(get_guard().'/');

        }
        else {
            return view('auth.login_officemanager');
        }
    }


    
    public function index_caposala()
    {
        if (logged_in()) {

            return redirect(get_guard().'/');

        }
        else {
            return view('auth.login_caposala');
        }
    }



    public function index_guard_overall(){
        
        if (logged_in()) {


            if(logged_in()->account_id==='caposala'){
                $manager = Agents::where('account_id', 'manager')->get();
                }
        
                if(logged_in()->account_id==='officemanager'){
                $manager = Agents::where('account_id', 'manager')->where('promo_code',logged_in()->promo_code)->get();
                }
        
                if(logged_in()->account_id==='teamleader'){
                    $manager = Agents::where('account_id', 'manager')->where('teamleader',logged_in()->id)->get();
                }
        
        
                if(logged_in()->account_id==='affiliator'){
                    $manager = null;
                }
        
                
        
                $statuses = Status::whereNotNull('id')->get();
                return view('admin.leads')->with(['statuses'=>$statuses, 'manager'=>$manager]);
           
        }

        else {
            return view('user.select');
        }
    }









// ----------------------------------------------------------------------------- APPROVE USERS START -------------------------------------------------------------------------------------

    public function approve_users()
    {
        //

        return view('manager.users_approve');

    }

    public function ApproveUsers(Request $request)
    {


        $user = User::where('manager',logged_in()->id)->select(['id','account_id','name','email','active','exclient','check_deposit','formation','can_spin','can_withdraw','forex_signals','commodities_signals','indices_signals','stocks_signals','crypto_signals','ip','ip_country','ip_city','created_at'])->orderBy('created_at','desc');;
        if (!empty($request->get('account'))) {
            $user = $user->where('account_id','LIKE',"%{$request->account}%");
        }
        if (!empty($request->get('name'))) {
            $user = $user->where('name','LIKE',"%{$request->name}%");
        }
        if (!empty($request->get('name')) AND !empty($request->get('account'))) {
            $user = $user->where('name','LIKE',"%{$request->name}%")->where('account_id','LIKE',"%{$request->account}%");
        }
        return Datatables::of($user)
            ->addIndexColumn()

            ->addColumn('checkbox_new', function ($user) {


                $btn = '<input type="checkbox"  name="checkbox" onclick="checkUser_new(' . $user->id . ' ,' . $user->mt4_account . ' , event)">';
                return $btn;
            })

            ->addColumn('name', function ($user) {
                $btn = '<a href="'.url('/user_profile/'.$user->id).'">' . $user->name . '</a>';
                return $btn;
            })
            ->addColumn('action', function ($user) {

                if (Cache::has('user-is-online-' . $user->id))
                    $btn3 = '<i class="fa fa-circle font-16 onlineStatus online"></i>';
                else $btn3 = '<i class="far fa-circle font-16 onlineStatus offline"></i>';
                return $btn3;
            })

            ->addColumn('exclient', function ($user) {

                if ($user->exclient) {

                    if (logged_in()->exclient)
                    $btn = '<div class="custom-control any-switch custom-switch"><input checked onclick="set_exclient_new(' . $user->id . ', event.target.checked)" type="checkbox" class="custom-control-input" id="activeExclient' . $user->id . '"><label class="custom-control-label" for="activeExclient' . $user->id . '"></label></div>';
                    else
                    $btn = '<div class="custom-control any-switch custom-switch"><input checked disabled onclick="set_exclient_new(' . $user->id . ', event.target.checked)" type="checkbox" class="custom-control-input" id="activeExclient' . $user->id . '"><label class="custom-control-label" for="activeExclient' . $user->id . '"></label></div>';

                } else

                    if (logged_in()->exclient)
                    $btn = '<div class="custom-control any-switch custom-switch"><input onclick="set_exclient_new(' . $user->id . ', event.target.checked)" type="checkbox" class="custom-control-input" id="activeExclient' . $user->id . '"><label class="custom-control-label" for="activeExclient' . $user->id . '"></label></div>';
                    else
                    $btn = '<div class="custom-control any-switch custom-switch"><input disabled onclick="set_exclient_new(' . $user->id . ', event.target.checked)" type="checkbox" class="custom-control-input" id="activeExclient' . $user->id . '"><label class="custom-control-label" for="activeExclient' . $user->id . '"></label></div>';

                return $btn;
            })

            ->addColumn('formation', function ($user) {

                if ($user->formation) {

                    if (logged_in()->formation)
                        $btn = '<div class="custom-control any-switch custom-switch"><input checked onclick="set_formation_new(' . $user->id . ', event.target.checked)" type="checkbox" class="custom-control-input" id="activeFormation' . $user->id . '"><label class="custom-control-label" for="activeFormation' . $user->id . '"></label></div>';
                    else
                        $btn = '<div class="custom-control any-switch custom-switch"><input checked disabled onclick="set_formation_new(' . $user->id . ', event.target.checked)" type="checkbox" class="custom-control-input" id="activeFormation' . $user->id . '"><label class="custom-control-label" for="activeFormation' . $user->id . '"></label></div>';

                } else

                    if (logged_in()->formation)
                        $btn = '<div class="custom-control any-switch custom-switch"><input onclick="set_formation_new(' . $user->id . ', event.target.checked)" type="checkbox" class="custom-control-input" id="activeFormation' . $user->id . '"><label class="custom-control-label" for="activeFormation' . $user->id . '"></label></div>';
                    else
                        $btn = '<div class="custom-control any-switch custom-switch"><input disabled onclick="set_formation_new(' . $user->id . ', event.target.checked)" type="checkbox" class="custom-control-input" id="activeFormation' . $user->id . '"><label class="custom-control-label" for="activeFormation' . $user->id . '"></label></div>';

                return $btn;
            })



            ->addColumn('can_spin', function ($user) {

                if ($user->can_spin) {

                    if (logged_in()->can_spin)
                        $btn = '<div class="custom-control any-switch custom-switch"><input checked onclick="set_spin_new(' . $user->id . ', event.target.checked)" type="checkbox" class="custom-control-input" id="spinSwitch' . $user->id . '"><label class="custom-control-label" for="spinSwitch' . $user->id . '"></label></div>';
                    else
                        $btn = '<div class="custom-control any-switch custom-switch"><input checked disabled onclick="set_spin_new(' . $user->id . ', event.target.checked)" type="checkbox" class="custom-control-input" id="spinSwitch' . $user->id . '"><label class="custom-control-label" for="spinSwitch' . $user->id . '"></label></div>';

                } else

                    if (logged_in()->can_spin)
                        $btn = '<div class="custom-control any-switch custom-switch"><input onclick="set_spin_new(' . $user->id . ', event.target.checked)" type="checkbox" class="custom-control-input" id="spinSwitch' . $user->id . '"><label class="custom-control-label" for="spinSwitch' . $user->id . '"></label></div>';
                    else
                        $btn = '<div class="custom-control any-switch custom-switch"><input disabled onclick="set_spin_new(' . $user->id . ', event.target.checked)" type="checkbox" class="custom-control-input" id="spinSwitch' . $user->id . '"><label class="custom-control-label" for="spinSwitch' . $user->id . '"></label></div>';

                return $btn;
            })


            ->addColumn('can_withdraw', function ($user) {

                if ($user->can_withdraw) {

                    if (logged_in()->can_withdraw)
                        $btn = '<div class="custom-control any-switch custom-switch"><input checked onclick="set_withdraw_new(' . $user->id . ', event.target.checked)" type="checkbox" class="custom-control-input" id="withdrawSwitch' . $user->id . '"><label class="custom-control-label" for="withdrawSwitch' . $user->id . '"></label></div>';
                    else
                        $btn = '<div class="custom-control any-switch custom-switch"><input checked disabled onclick="set_withdraw_new(' . $user->id . ', event.target.checked)" type="checkbox" class="custom-control-input" id="withdrawSwitch' . $user->id . '"><label class="custom-control-label" for="withdrawSwitch' . $user->id . '"></label></div>';

                } else

                    if (logged_in()->can_withdraw)
                        $btn = '<div class="custom-control any-switch custom-switch"><input onclick="set_withdraw_new(' . $user->id . ', event.target.checked)" type="checkbox" class="custom-control-input" id="withdrawSwitch' . $user->id . '"><label class="custom-control-label" for="withdrawSwitch' . $user->id . '"></label></div>';
                    else
                        $btn = '<div class="custom-control any-switch custom-switch"><input disabled onclick="set_withdraw_new(' . $user->id . ', event.target.checked)" type="checkbox" class="custom-control-input" id="withdrawSwitch' . $user->id . '"><label class="custom-control-label" for="withdrawSwitch' . $user->id . '"></label></div>';

                return $btn;
            })


            ->addColumn('forex_signals', function ($user) {

                if ($user->forex_signals) {

                    if (logged_in()->forex_signals)
                        $btn = '<div class="custom-control any-switch custom-switch"><input checked onclick="set_forex_new(' . $user->id . ', event.target.checked)" type="checkbox" class="custom-control-input" id="forexSwitch' . $user->id . '"><label class="custom-control-label" for="forexSwitch' . $user->id . '"></label></div>';
                    else
                        $btn = '<div class="custom-control any-switch custom-switch"><input checked disabled onclick="set_forex_new(' . $user->id . ', event.target.checked)" type="checkbox" class="custom-control-input" id="forexSwitch' . $user->id . '"><label class="custom-control-label" for="forexSwitch' . $user->id . '"></label></div>';

                } else

                    if (logged_in()->forex_signals)
                        $btn = '<div class="custom-control any-switch custom-switch"><input onclick="set_forex_new(' . $user->id . ', event.target.checked)" type="checkbox" class="custom-control-input" id="forexSwitch' . $user->id . '"><label class="custom-control-label" for="forexSwitch' . $user->id . '"></label></div>';
                    else
                        $btn = '<div class="custom-control any-switch custom-switch"><input disabled onclick="set_forex_new(' . $user->id . ', event.target.checked)" type="checkbox" class="custom-control-input" id="forexSwitch' . $user->id . '"><label class="custom-control-label" for="forexSwitch' . $user->id . '"></label></div>';

                return $btn;
            })


            ->addColumn('commodities_signals', function ($user) {

                if ($user->commodities_signals) {

                    if (logged_in()->commodities_signals)
                        $btn = '<div class="custom-control any-switch custom-switch"><input checked onclick="set_commodities_new(' . $user->id . ', event.target.checked)" type="checkbox" class="custom-control-input" id="commoditiesSwitch' . $user->id . '"><label class="custom-control-label" for="commoditiesSwitch' . $user->id . '"></label></div>';
                    else
                        $btn = '<div class="custom-control any-switch custom-switch"><input checked disabled onclick="set_commodities_new(' . $user->id . ', event.target.checked)" type="checkbox" class="custom-control-input" id="commoditiesSwitch' . $user->id . '"><label class="custom-control-label" for="commoditiesSwitch' . $user->id . '"></label></div>';

                } else

                    if (logged_in()->commodities_signals)
                        $btn = '<div class="custom-control any-switch custom-switch"><input onclick="set_commodities_new(' . $user->id . ', event.target.checked)" type="checkbox" class="custom-control-input" id="commoditiesSwitch' . $user->id . '"><label class="custom-control-label" for="commoditiesSwitch' . $user->id . '"></label></div>';
                    else
                        $btn = '<div class="custom-control any-switch custom-switch"><input disabled onclick="set_commodities_new(' . $user->id . ', event.target.checked)" type="checkbox" class="custom-control-input" id="commoditiesSwitch' . $user->id . '"><label class="custom-control-label" for="commoditiesSwitch' . $user->id . '"></label></div>';

                return $btn;
            })


            ->addColumn('indices_signals', function ($user) {

                if ($user->indices_signals) {

                    if (logged_in()->indices_signals)
                        $btn = '<div class="custom-control any-switch custom-switch"><input checked onclick="set_indices_new(' . $user->id . ', event.target.checked)" type="checkbox" class="custom-control-input" id="indicesSwitch' . $user->id . '"><label class="custom-control-label" for="indicesSwitch' . $user->id . '"></label></div>';
                    else
                        $btn = '<div class="custom-control any-switch custom-switch"><input checked disabled onclick="set_indices_new(' . $user->id . ', event.target.checked)" type="checkbox" class="custom-control-input" id="indicesSwitch' . $user->id . '"><label class="custom-control-label" for="indicesSwitch' . $user->id . '"></label></div>';

                } else

                    if (logged_in()->indices_signals)
                        $btn = '<div class="custom-control any-switch custom-switch"><input onclick="set_indices_new(' . $user->id . ', event.target.checked)" type="checkbox" class="custom-control-input" id="indicesSwitch' . $user->id . '"><label class="custom-control-label" for="indicesSwitch' . $user->id . '"></label></div>';
                    else
                        $btn = '<div class="custom-control any-switch custom-switch"><input disabled onclick="set_indices_new(' . $user->id . ', event.target.checked)" type="checkbox" class="custom-control-input" id="indicesSwitch' . $user->id . '"><label class="custom-control-label" for="indicesSwitch' . $user->id . '"></label></div>';

                return $btn;
            })


            ->addColumn('stocks_signals', function ($user) {

                if ($user->stocks_signals) {

                    if (logged_in()->stocks_signals)
                        $btn = '<div class="custom-control any-switch custom-switch"><input checked onclick="set_stocks_new(' . $user->id . ', event.target.checked)" type="checkbox" class="custom-control-input" id="stocksSwitch' . $user->id . '"><label class="custom-control-label" for="stocksSwitch' . $user->id . '"></label></div>';
                    else
                        $btn = '<div class="custom-control any-switch custom-switch"><input checked disabled onclick="set_stocks_new(' . $user->id . ', event.target.checked)" type="checkbox" class="custom-control-input" id="stocksSwitch' . $user->id . '"><label class="custom-control-label" for="stocksSwitch' . $user->id . '"></label></div>';

                } else

                    if (logged_in()->stocks_signals)
                        $btn = '<div class="custom-control any-switch custom-switch"><input onclick="set_stocks_new(' . $user->id . ', event.target.checked)" type="checkbox" class="custom-control-input" id="stocksSwitch' . $user->id . '"><label class="custom-control-label" for="stocksSwitch' . $user->id . '"></label></div>';
                    else
                        $btn = '<div class="custom-control any-switch custom-switch"><input disabled onclick="set_stocks_new(' . $user->id . ', event.target.checked)" type="checkbox" class="custom-control-input" id="stocksSwitch' . $user->id . '"><label class="custom-control-label" for="stocksSwitch' . $user->id . '"></label></div>';

                return $btn;
            })



            ->addColumn('crypto_signals', function ($user) {

                if ($user->crypto_signals) {

                    if (logged_in()->crypto_signals)
                        $btn = '<div class="custom-control any-switch custom-switch"><input checked onclick="set_crypto_new(' . $user->id . ', event.target.checked)" type="checkbox" class="custom-control-input" id="cryptoSwitch' . $user->id . '"><label class="custom-control-label" for="cryptoSwitch' . $user->id . '"></label></div>';
                    else
                        $btn = '<div class="custom-control any-switch custom-switch"><input checked disabled onclick="set_crypto_new(' . $user->id . ', event.target.checked)" type="checkbox" class="custom-control-input" id="cryptoSwitch' . $user->id . '"><label class="custom-control-label" for="cryptoSwitch' . $user->id . '"></label></div>';

                } else

                    if (logged_in()->crypto_signals)
                        $btn = '<div class="custom-control any-switch custom-switch"><input onclick="set_crypto_new(' . $user->id . ', event.target.checked)" type="checkbox" class="custom-control-input" id="cryptoSwitch' . $user->id . '"><label class="custom-control-label" for="cryptoSwitch' . $user->id . '"></label></div>';
                    else
                        $btn = '<div class="custom-control any-switch custom-switch"><input disabled onclick="set_crypto_new(' . $user->id . ', event.target.checked)" type="checkbox" class="custom-control-input" id="cryptoSwitch' . $user->id . '"><label class="custom-control-label" for="cryptoSwitch' . $user->id . '"></label></div>';

                return $btn;
            })


            ->rawColumns(['checkbox_new', 'name', 'action', 'active', 'exclient', 'check_deposit', 'formation', 'can_spin', 'can_withdraw', 'forex_signals', 'commodities_signals', 'indices_signals', 'stocks_signals', 'crypto_signals'])
            ->make();

    }



// --------------------------------------------------------------------------- APPROVE USERS END --------------------------------------------------------------------------------------














// ----------------------------------------------------------------------------- USERS START -------------------------------------------------------------------------------------

    public function users()
    {
        $statuses = Status::whereNotNull('id')->get();
        return view('manager.users')->with(['statuses'=>$statuses]);

    }

    public function getUsersWithoutDeposit(Request $request)
    {

        $user = User::whereNotIn('account_id', ['manager','customer_service','affiliator','teamleader','officemanager','admin'])
            ->where('manager',logged_in()->id)
            ->where('exclient', 0)
            ->whereNotIn('id', function($query) {$query->select('user_id')->from('deposits');})
            ->orderBy('created_at','desc');


        
            if (!empty($request->get('fromdate'))) {
                $user = $user->whereBetween('created_at', [$request['fromdate'], $request['todate']]);
    
            }
    
            if (!empty($request->get('status'))) {
                $user = $user->whereIn('status_id', $request->status);
            }
    
            if (!empty($request->get('name'))) {
                $user = $user->where('name','LIKE',"%{$request->name}%");
            }
    
               
            if (!empty($request->get('phone'))){
    
                $user = $user->where('phone','LIKE',"%{$request->phone}%");
            }
    
            if (!empty($request->get('email'))){
    
                $user = $user->where('phone', $request->email);
            }
    
            if (!empty($request->get('country'))){
    
                $user = $user->where('country', $request->country);
            }
    


         return Datatables::of($user)

            ->addIndexColumn()

       

            ->addColumn('action', function ($user) {

                if (Cache::has('user-is-online-' . $user->id))
                    $btn3 = '<i class="fa fa-circle font-16 onlineStatus online"></i>';
                else
                    $btn3 = '<i class="far fa-circle font-16 onlineStatus offline"></i>';


                $btn5 = '<a href="'.url('/user_profile/'.$user->id).'"><i class="fa fa-user-tie m-l-10 font-20"></i></a>';
                $btn4 = '<div class="d-flex">' . $btn5 . ' ' . $btn3 . '</div>';

                return $btn4;
            })



            ->addColumn('status', function ($user) {
                $btn = ''.$user->status->status.'';

                return $btn;
            })




            ->rawColumns(['action','status'])
            ->make();

    }



// --------------------------------------------------------------------------- USERS END ---------------------------------------------------------------------------------------------------










//---------------------------------------------------------------------------- MANAGER CLIENTS -------------------------------------------------------------------------------------------------



    public function clients()
    {
        $statuses = Status::whereNotNull('id')->get();

        return view('manager.clients')->with(['statuses'=>$statuses]);;

    }

    public function getClients(Request $request)
    {

        $user = User::whereNotIn('account_id', ['manager','officemanager','admin'])
            ->where('manager', logged_in()->id)
            ->where('exclient', 0)
            ->whereIn('id', function($query) {$query->select('user_id')->from('deposits');});
        //    ->orderBy('created_at','desc');


       
        if (!empty($request->get('fromdate'))) {
            $user = $user->whereBetween('created_at', [$request['fromdate'], $request['todate']]);

        }

        if (!empty($request->get('status'))) {
            $user = $user->whereIn('status_id', $request->status);
        }

        if (!empty($request->get('name'))) {
            $user = $user->where('name','LIKE',"%{$request->name}%");
        }

        
        if (!empty($request->get('phone'))){

            $user = $user->where('phone','LIKE',"%{$request->phone}%");
        }

        if (!empty($request->get('email'))){

            $user = $user->where('phone', $request->email);
        }

        if (!empty($request->get('country'))){

            $user = $user->where('country', $request->country);
        }
      

        return Datatables::of($user)

            ->addIndexColumn()




            ->addColumn('action', function ($user) {

                if (Cache::has('user-is-online-' . $user->id))
                    $btn3 = '<i class="fa fa-circle font-16 onlineStatus online"></i>';
                else
                    $btn3 = '<i class="far fa-circle font-16 onlineStatus offline"></i>';


                $btn5 = '<a href="'.url('/user_profile/'.$user->id).'"><i class="fa fa-user-tie m-l-10 font-20"></i></a>';
                $btn4 = '<div class="d-flex">' . $btn5 . ' ' . $btn3 . '</div>';

                return $btn4;
            })


            ->addColumn('status', function ($user) {
                $btn = ''.$user->status->status.'';

                return $btn;
            })




            ->rawColumns(['action', 'name','status'])
            ->make();

    }



//--------------------------------------------------------------------------- CLIENTS END --------------------------------------------------------------------------------------------------------










//---------------------------------------------------------------------------- EXCLIENTS -------------------------------------------------------------------------------------------------



    public function exclients()
    {
        //
        $statuses = Status::whereNotNull('id')->get();

        return view('manager.exclients')->with(['statuses'=>$statuses]);

    }

    public function getExclients(Request $request)
    {

        $user = User::where('exclient', 1)->where('manager', logged_in()->id)->orderBy('created_at','desc');

          
        if (!empty($request->get('fromdate'))) {
            $user = $user->whereBetween('created_at', [$request['fromdate'], $request['todate']]);
    
        }
    
        if (!empty($request->get('status'))) {
            $user = $user->whereIn('status_id', $request->status);
        }
    
        if (!empty($request->get('name'))) {
            $user = $user->where('name','LIKE',"%{$request->name}%");
        }
    
      
        if (!empty($request->get('phone'))){
    
            $user = $user->where('phone','LIKE',"%{$request->phone}%");
        }
    
        if (!empty($request->get('email'))){
    
            $user = $user->where('phone', $request->email);
        }
    
        if (!empty($request->get('country'))){
    
            $user = $user->where('country', $request->country);
        }
    
   

        return Datatables::of($user)

         

        

            ->addColumn('name', function ($user) {
                $btn = '<a href="'.url('/user_profile/'.$user->id).'">' . $user->name . '</a>';

                return $btn;

            })

            ->addColumn('action', function ($user) {

                if (Cache::has('user-is-online-' . $user->id))
                    $btn3 = '<i class="fa fa-circle font-16 onlineStatus online"></i>';
                else
                    $btn3 = '<i class="far fa-circle font-16 onlineStatus offline"></i>';

                return $btn3;
            })


      
          
            ->addColumn('status', function ($user) {
                $btn = ''.$user->status->status.'';

                return $btn;
            })


            ->rawColumns(['checkbox_new', 'name', 'action','status'])
            ->make();

    }



//--------------------------------------------------------------------------- EXCLIENTS END -------------------------------------------------------------------------------------------------










//---------------------------------------------------------------------------- LEADS -------------------------------------------------------------------------------------------------



    public function leads()
    {
        $statuses = Status::whereNotNull('id')->get();
        return view('manager.leads')->with(['statuses'=>$statuses]);

    }

    public function getLeads(Request $request)
    {

        $user = ImportCsv::where('manager',logged_in()->id)->orderBy('created_at','desc');


     
        if (!empty($request->get('fromdate'))) {
            $user = $user->whereBetween('created_at', [$request['fromdate'], $request['todate']]);

        }

        if (!empty($request->get('status'))) {
            $user = $user->whereIn('status_id', $request->status);
        }

        if (!empty($request->get('firstname'))) {
            $user = $user->where('first_name','LIKE',"%{$request->firstname}%");
        }

        
        if (!empty($request->get('lastname'))) {
            $user = $user->where('last_name','LIKE',"%{$request->lastname}%");
        }


        if (!empty($request->get('phone'))){

            $user = $user->where('phone','LIKE',"%{$request->phone}%");
        }

        if (!empty($request->get('email'))){

            $user = $user->where('email', $request->email);
        }

        if (!empty($request->get('country'))){
            
             $user = $user->where('country','LIKE',"%{$request->country}%");

        }

        if (!empty($request->get('source'))){
            
            
        $user = $user->where('source','LIKE',"%{$request->source}%");
        }



        return Datatables::of($user)




            ->addIndexColumn()



            ->addColumn('checkbox_new', function ($user) {

                $btn = '<input type="checkbox"  name="checkbox[]" onchange="checkUser_new(' . $user->id . ' ,' . $user->phone . ' , event)">';

                return $btn;
            })







            ->addColumn('view_lead', function ($user) {
                $btn = '<a href="'.url('manager/lead_profile/'.$user->id).'"><i class="fa fa-user-tie m-l-10 font-20"></i></a>';

                return $btn;

            })


//

            ->addColumn('call', function ($user) {

                $btn = '<a onclick="sipCall(\'call-audio\', \''.logged_in()->sip.$user->phone.'\')"><i class="fa fa-phone font-20 callIcon"></i></a>';

                return $btn;

            })



            ->addColumn('status', function ($user) {
                $btn = ''.$user->status->status.'';

                return $btn;
            })





            ->rawColumns(['checkbox_new','view_lead', 'call', 'email', 'status',])
            ->make();
    }



//--------------------------------------------------------------------------- LEADS END --------------------------------------------------------------------------------------------------------











  public function reminder_popup($id)
    {

        $user=Calendar::findOrFail($id);
        $contacts=User::where('id',$user->client_id)->first();
        return view('manager.reminder_popup')->with(['user'=>$user, 'contacts'=>$contacts]);
    }


















//---------------------------------------------------------------------------- DEPOSIT REQUESTS -------------------------------------------------------------------------------------------------



    public function deposit_request()
    {

        return view('manager.deposit_requests');

    }

    public function getDepositRequests(Request $request)
    {

        $deposit_requests = Deposit_request::whereNotNull('user_id')->join('users', 'deposit_requests.user_id', '=', 'users.id')->where('users.manager', logged_in()->id)->select('deposit_requests.*', 'users.name as name', 'users.mt4_account as mt4_account', 'users.account_id as account_id')->orderBy('created_at','desc');


        if(logged_in()->account_id === 'officemanager'){
    
           $deposit_requests = Deposit_request::whereNotNull('user_id')->join('users', 'deposit_requests.user_id', '=', 'users.id')->where('users.promo_code', logged_in()->promo_code)->select('deposit_requests.*', 'users.name as name', 'users.mt4_account as mt4_account', 'users.account_id as account_id')->orderBy('created_at','desc');

        }

        
        if(logged_in()->account_id === 'teamleader'){
            $mng=Agents::where('account_id','manager')->where('teamleader', logged_in()->id)->select('id');
            
            $deposit_requests = Deposit_request::whereNotNull('user_id')->join('users', 'deposit_requests.user_id', '=', 'users.id')->whereIn('users.manager',$mng)->select('deposit_requests.*', 'users.name as name', 'users.mt4_account as mt4_account', 'users.account_id as account_id')->orderBy('created_at','desc');
 
         }

 
        if (!empty($request->get('name'))) {
            $deposit_requests = $deposit_requests->where('name','LIKE',"%{$request->name}%");
        }
       

        return Datatables::of($deposit_requests)

            ->addIndexColumn()

            ->rawColumns([])
            ->make();

    }



//--------------------------------------------------------------------------- DEPOSIT REQUESTS --------------------------------------------------------------------------------------------------------






    //---------------------------------------------------------------------------- TRANSACTION LOGS -------------------------------------------------------------------------------------------------



    public function transaction_logs()
    {

        return view('manager.transactions' );

    }

    public function getTransactions(Request $request)
    {


        $transaction = Transaction_logs::whereNotNull('user_id')->join('users', 'transaction_logs.user_id', '=', 'users.id')->where('users.manager', logged_in()->id)->select('transaction_logs.*', 'users.name', 'users.mt4_account', 'users.account_id')->orderBy('created_at','desc');


        if(logged_in()->account_id === 'officemanager'){
    
           $transaction = Transaction_logs::whereNotNull('user_id')->join('users', 'transaction_logs.user_id', '=', 'users.id')->where('users.promo_code', logged_in()->promo_code)->select('transaction_logs.*', 'users.name', 'users.mt4_account', 'users.account_id')->orderBy('created_at','desc');

        }

        
        if(logged_in()->account_id === 'teamleader'){
            $mng=Agents::where('account_id','manager')->where('teamleader', logged_in()->id)->select('id');
            
            $transaction = Transaction_logs::whereNotNull('user_id')->join('users', 'transaction_logs.user_id', '=', 'users.id')->whereIn('users.manager',$mng)->select('transaction_logs.*', 'users.name', 'users.mt4_account', 'users.account_id')->orderBy('created_at','desc');
 
         }


       
        if (!empty($request->get('name'))) {
            $transaction = $transaction->where('name','LIKE',"%{$request->name}%");
        }
        if (!empty($request->get('status'))){
            $transaction = $transaction->where('status','LIKE',"%{$request->status}%");
        }

        return Datatables::of($transaction)

            ->addIndexColumn()

            ->setRowClass(function ($transaction) {
                if ($transaction->status === 'success' || $transaction->status === 'completed')
                return 'bg-success-light';
                else if ($transaction->status === 'pending')
                return 'bg-pending';
                else return 'bg-danger-light';
            })



            ->addColumn('action', function ($transaction) {

                if ($transaction->type === 'bank')
                $btn2='<i style="color:white" class="fa fa-university font-18 transactionType"></i>';
                else
                $btn2='<i style="color:white" class="fa fa-credit-card"></i>';

               
               

                return $btn2;
            })


            ->addColumn('deposit_type', function ($transaction) {

                if ($transaction->deposit_type === 'positive')
                    $btn='<i style="color: green" class="fa fa-arrow-right font-18 transactionType"></i>';
                else
                    $btn='<i style="color: red" class="fa fa-arrow-left font-18 transactionType"></i>';


                return $btn;
            })

            ->rawColumns(['action','deposit_type'])
            ->make();

    }



//--------------------------------------------------------------------------- TRANSACTION LOGS --------------------------------------------------------------------------------------------------------







    public function calendar()
    {
        return view('manager.calendar');
    }


    public function surveys_list(){

        //
        $surveys=Survey::whereNotNull('id')->orderByDesc('created_at')->get();
        return view('manager.surveys')->with(['surveys'=>$surveys]);
    }


    public function login_user($id){

        $user=User::find($id);
        $test=$user->account_id;
        Auth::guard($test)->loginUsingId($id);
        return redirect()->action('HomeController@index');
    }

    public function login_manager_test(Request $request){
        $this->validate($request,[
            'user_id'=>'required',
            'value'=>'required']);

        $real_manager = User::where('id',$request['user_id'])->update([
            'real_manager'=>$request['value']
        ]);

        return $real_manager;
    }



    public function closure_requests(){
        $requests=Closure::all();
        return view('manager.closure_requests')->with(['requests'=>$requests]);
    }



    public function withdraws_list(){


        $withdraws = Withdraw::whereNotNull('user_id')->join('users', 'withdraws.user_id', '=', 'users.id')->where('users.manager', logged_in()->id)->orderBy('withdraws.created_at','desc')->get();

        
        if(logged_in()->account_id === 'officemanager'){
    
            $withdraws = Withdraw::whereNotNull('user_id')->join('users', 'withdraws.user_id', '=', 'users.id')->where('users.promo_code', logged_in()->promo_code)->select('withdraws.*', 'users.name as name', 'users.mt4_account as mt4_account', 'users.account_id as account_id')->orderBy('created_at','desc');
 
         }
 
         
         if(logged_in()->account_id === 'teamleader'){
             $mng=Agents::where('account_id','manager')->where('teamleader', logged_in()->id)->select('id');
             
             $withdraws = Withdraw::whereNotNull('user_id')->join('users', 'withdraws.user_id', '=', 'users.id')->whereIn('users.manager',$mng)->select('withdraws.*', 'users.name as name', 'users.mt4_account as mt4_account', 'users.account_id as account_id')->orderBy('created_at','desc');
  
          }


    //    return $withdraws;
        return view('manager.withdraws')->with(['withdraws'=>$withdraws]);
    }


    public function manager_form()
    {
        $form_data = FormData::where('manager_id',logged_in()->id)->get();
        $new='';
        return view('manager.manager_form')->with(['data'=>$form_data,'new'=>$new]);
    }






    public function get_manager_form()
    {

        $form_data = FormData::where('manager_id',logged_in()->id)->get();

//               return json_decode($form_data,true);;
         $new_array=[];
        foreach ($form_data as $form_data)
        $new = json_decode($form_data->result,true);
        foreach ($new as $new){
          array_push($new_array,$new);
        }
        return $new_array;

    }





    public function post_form_data(Request $request)
    {

        $form_data = new FormData();
        $form_data->manager_id = logged_in()->id;
        $form_data->result = json_encode($request['form_dataaa'],true);
        $form_data->new_clients = $request['new_clients'];
        $form_data->save();
        return$form_data;

    }


    public function find_manager_form(Request $request){

        $form_data = FormData::where('manager_id',$request['user_name'])->with('user:name,id')->get();
        $allInfo=array('form_data'=>$form_data);
        return response()->json($allInfo);
    }



}
