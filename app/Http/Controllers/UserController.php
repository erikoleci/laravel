<?php

namespace App\Http\Controllers;

use App\Account;
use App\Calendar;
use App\Collateral;
use App\Comment;
use App\Credit;
use App\Deposit;
use App\FormData;
use App\ImportCsv;
use App\Imports\CsvImport;
use App\Investments;
use App\Mail\RegistrationEmail;
use App\Mail\SimpleMail;
use App\Mail\UserMail;
use App\Margin;
use App\Operation;
use App\Project;
use App\SendgridEmail;
use App\Status;
use App\Survey;
use App\ToolsRepository;
use App\Traits\AccountsTrait;
use App\Upload;
use App\User;
use App\Desks;
use App\PromoCode;
use App\Agents;
use App\Userip;
use Carbon\Carbon;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use PhpParser\JsonDecoder;
use Symfony\Component\Console\Input\Input;
use Tenfef\IPFind\APIErrorException;
use Tenfef\IPFind\InvalidIPAddressException;
use Tenfef\IPFind\IPFind;
use Tenfef\IPFind\UnexpectedResponseException;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Button;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use AccountsTrait;

    public function __construct()
    {
        $this->middleware('auth:admin',['only' => ['getFile']]);
    }

    public function index()
    {
        //
        $users=User::where('account_id','!=','manager')->orderByDesc('created_at')->with('uploads')->get();
        return view('admin.clients_list')->with(['users'=>$users]);
    }

    public function register($slug){

    }

    public function login($slug){

    }

    public function nodeposit()
    {
        //
        $users=User::whereNotIn('account_id', ['manager','customer_service'])->orderByDesc('created_at')->get();
        return view('admin.users_list')->with(['users'=>$users]);
    }

//    public function exclients()
//    {
//        //
//        $users=User::where('account_id','!=','manager')->orderByDesc('created_at')->get();
//        return view('admin.exclients_list')->with(['users'=>$users]);
//    }


    public function promousers()
    {
        //
        $users=User::where('account_id','=','promo')->where('exclient','=','promo')->orderByDesc('created_at')->get();
        $credits=Credit::all();
        return view('admin.users_promo')->with(['users'=>$users, 'credits'=>$credits]);
    }


    public function submit_promo(Request $request){
        $promo_data=$request->all();


        $account=Account::where('slug', $promo_data['account_id'])->first();

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'account_id' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'country_code' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'promo_code' => [Rule::in($account->promo_code)],
            'over_18' => ['required', 'boolean'],
            'accept_terms' => ['required', 'boolean'],
        ]);

        return view('user.promo_redirect')->with(['promo_data'=>$promo_data]);
    }

    public function approve_clients()
    {
        //
        $users=User::whereNotIn('account_id', ['manager','customer_service'])->orderByDesc('created_at')->get();
        return view('admin.users_approve')->with(['users'=>$users]);

    }










// ----------------------------------------------------------------------------- APPROVE USERS START -------------------------------------------------------------------------------------

        public function approve_users()
    {
        //

        return view('admin.approve_users');

    }

    public function ApproveUsers(Request $request)
    {




        
        if(logged_in()->account_id === 'admin'){

            $user = User::whereNotIn('account_id', ['manager','customer_service','teamleader','officemanager','affiliator'])->select(['id','name','email','mt4_account','active','exclient','recycle','can_spin','forex_signals','commodities_signals','indices_signals','stocks_signals','crypto_signals','ip','ip_country','ip_city','created_at'])->orderBy('created_at','desc');
            }
    
    
            if(logged_in()->account_id === 'officemanager'){
    
            $user = User::where('promo_code', logged_in()->promo_code)->select(['id','name','email','mt4_account','active','exclient','recycle','can_spin','forex_signals','commodities_signals','indices_signals','stocks_signals','crypto_signals','ip','ip_country','ip_city','created_at'])->orderBy('created_at','desc');

            }


            if(logged_in()->account_id==='teamleader'){
                $mng=Agents::where('account_id','manager')->where('teamleader', logged_in()->id)->select('id');
                $user = User::whereNotNull('id')->whereIn('manager',$mng)->select(['id','name','email','mt4_account','active','exclient','recycle','can_spin','forex_signals','commodities_signals','indices_signals','stocks_signals','crypto_signals','ip','ip_country','ip_city','created_at'])->orderBy('created_at','desc');
            }
        
 
            if (!empty($request->get('name'))) {
            $user = $user->where('name','LIKE',"%{$request->name}%");
            }

            if (!empty($request->get('manager'))){

            $user = $user->where('manager','LIKE',"%{$request->manager}%");
            }

    
        return Datatables::of($user)

            ->addIndexColumn()

            ->addColumn('checkbox_new', function ($user) {

                $btn = '<input type="checkbox"  name="checkbox" onclick="checkUser_new(' . $user->id . ' ,' . $user->mt4_account . ' , event)">';

                return $btn;
            })


            ->addColumn('name', function ($user) {
                $btn = '<a href="'.url('admin/client/'.$user->id).'">' . $user->name . '</a>';

                return $btn;

            })

            ->addColumn('action', function ($user) {

                if (Cache::has('user-is-online-' . $user->id))
                    $btn3 = '<i class="fa fa-circle font-16 onlineStatus online"></i>';
                else
                    $btn3 = '<i class="far fa-circle font-16 onlineStatus offline"></i>';
                   

                
                $btn5 = '<a href="'.url('/user_profile/'.$user->id).'"><i class="fa fa-user-tie m-l-10 font-20"></i></a>';
                $btn4 = '<div class="d-flex">' . $btn5 . ' ' . $btn3 . '</div>';

                return $btn4;
            })
                ->addColumn('active', function ($user) {

                    if ($user->active) {
                        $btn = '<div class="custom-control any-switch custom-switch"><input checked onclick="edituser_permission(' . $user->id . ', \'active\', event.target.checked)" type="checkbox" class="custom-control-input" id="activeSwitch' . $user->id . '"><label class="custom-control-label" for="activeSwitch' . $user->id . '"></label></div>';
                    } else $btn = '<div class="custom-control any-switch custom-switch"><input onclick="edituser_permission(' . $user->id . ', \'active\', event.target.checked)" type="checkbox" class="custom-control-input" id="activeSwitch' . $user->id . '"><label class="custom-control-label" for="activeSwitch' . $user->id . '"></label></div>';
                    return $btn;
                })
               
                ->addColumn('exclient', function ($user) {

                    if ($user->exclient) {
                        $btn = '<div class="custom-control any-switch custom-switch"><input checked onclick="edituser_permission(' . $user->id . ', \'exclient\', event.target.checked)" type="checkbox" class="custom-control-input" id="activeExclient' . $user->id . '"><label class="custom-control-label" for="activeExclient' . $user->id . '"></label></div>';
                    } else $btn = '<div class="custom-control any-switch custom-switch"><input onclick="edituser_permission(' . $user->id . ', \'exclient\', event.target.checked)" type="checkbox" class="custom-control-input" id="activeExclient' . $user->id . '"><label class="custom-control-label" for="activeExclient' . $user->id . '"></label></div>';
                    return $btn;
                })
                 ->addColumn('recycle', function ($user) {

                   if ($user->recycle) {
                    $btn = '<div class="custom-control any-switch custom-switch"><input checked onclick="edituser_permission(' . $user->id . ', \'recycle\', event.target.checked)" type="checkbox" class="custom-control-input" id="activeRecycle' . $user->id . '"><label class="custom-control-label" for="activeRecycle' . $user->id . '"></label></div>';
                   } else $btn = '<div class="custom-control any-switch custom-switch"><input onclick="edituser_permission(' . $user->id . ', \'recycle\', event.target.checked)" type="checkbox" class="custom-control-input" id="activeRecycle' . $user->id . '"><label class="custom-control-label" for="activeRecycle' . $user->id . '"></label></div>';
                   return $btn;
                 })

           
               
                ->addColumn('can_spin', function ($user) {

                    if ($user->can_spin) {
                        $btn = '<div class="custom-control any-switch custom-switch"><input checked onclick="edituser_permission(' . $user->id . ', \'can_spin\', event.target.checked)" type="checkbox" class="custom-control-input" id="spinSwitch' . $user->id . '"><label class="custom-control-label" for="spinSwitch' . $user->id . '"></label></div>';
                    } else $btn = '<div class="custom-control any-switch custom-switch"><input onclick="edituser_permission(' . $user->id . ', \'can_spin\', event.target.checked)" type="checkbox" class="custom-control-input" id="spinSwitch' . $user->id . '"><label class="custom-control-label" for="spinSwitch' . $user->id . '"></label></div>';
                    return $btn;
                })
           
                ->addColumn('forex_signals', function ($user) {

                    if ($user->forex_signals) {
                        $btn = '<div class="custom-control any-switch custom-switch"><input checked onclick="edituser_permission(' . $user->id . ', \'forex_signals\', event.target.checked)" type="checkbox" class="custom-control-input" id="forexSwitch' . $user->id . '"><label class="custom-control-label" for="forexSwitch' . $user->id . '"></label></div>';
                    } else $btn = '<div class="custom-control any-switch custom-switch"><input onclick="edituser_permission(' . $user->id . ', \'forex_signals\', event.target.checked)" type="checkbox" class="custom-control-input" id="forexSwitch' . $user->id . '"><label class="custom-control-label" for="forexSwitch' . $user->id . '"></label></div>';
                    return $btn;
                })
                ->addColumn('commodities_signals', function ($user) {

                    if ($user->commodities_signals) {
                        $btn = '<div class="custom-control any-switch custom-switch"><input checked onclick="edituser_permission(' . $user->id . ', \'commodities_signals\', event.target.checked)" type="checkbox" class="custom-control-input" id="commoditiesSwitch' . $user->id . '"><label class="custom-control-label" for="commoditiesSwitch' . $user->id . '"></label></div>';
                    } else $btn = '<div class="custom-control any-switch custom-switch"><input onclick="edituser_permission(' . $user->id . ', \'commodities_signals\', event.target.checked)" type="checkbox" class="custom-control-input" id="commoditiesSwitch' . $user->id . '"><label class="custom-control-label" for="commoditiesSwitch' . $user->id . '"></label></div>';
                    return $btn;
                })
                ->addColumn('indices_signals', function ($user) {

                    if ($user->indices_signals) {
                        $btn = '<div class="custom-control any-switch custom-switch"><input checked onclick="edituser_permission(' . $user->id . ', \'indices_signals\', event.target.checked)" type="checkbox" class="custom-control-input" id="indicesSwitch' . $user->id . '"><label class="custom-control-label" for="indicesSwitch' . $user->id . '"></label></div>';
                    } else $btn = '<div class="custom-control any-switch custom-switch"><input onclick="edituser_permission(' . $user->id . ', \'indices_signals\', event.target.checked)" type="checkbox" class="custom-control-input" id="indicesSwitch' . $user->id . '"><label class="custom-control-label" for="indicesSwitch' . $user->id . '"></label></div>';
                    return $btn;
                })
                ->addColumn('stocks_signals', function ($user) {

                    if ($user->stocks_signals) {
                        $btn = '<div class="custom-control any-switch custom-switch"><input checked onclick="edituser_permission(' . $user->id . ', \'stocks_signals\', event.target.checked)" type="checkbox" class="custom-control-input" id="stocksSwitch' . $user->id . '"><label class="custom-control-label" for="stocksSwitch' . $user->id . '"></label></div>';
                    } else $btn = '<div class="custom-control any-switch custom-switch"><input onclick="edituser_permission(' . $user->id . ', \'stocks_signals\', event.target.checked)" type="checkbox" class="custom-control-input" id="stocksSwitch' . $user->id . '"><label class="custom-control-label" for="stocksSwitch' . $user->id . '"></label></div>';
                    return $btn;
                })
                ->addColumn('crypto_signals', function ($user) {

                    if ($user->crypto_signals) {
                        $btn = '<div class="custom-control any-switch custom-switch"><input checked onclick="edituser_permission(' . $user->id . ', \'crypto_signals\', event.target.checked)" type="checkbox" class="custom-control-input" id="cryptoSwitch' . $user->id . '"><label class="custom-control-label" for="cryptoSwitch' . $user->id . '"></label></div>';
                    } else $btn = '<div class="custom-control any-switch custom-switch"><input onclick="edituser_permission(' . $user->id . ', \'crypto_signals\', event.target.checked)" type="checkbox" class="custom-control-input" id="cryptoSwitch' . $user->id . '"><label class="custom-control-label" for="cryptoSwitch' . $user->id . '"></label></div>';
                    return $btn;
                })


                ->rawColumns(['checkbox_new', 'name', 'action', 'active', 'exclient', 'recycle' , 'can_spin', 'forex_signals', 'commodities_signals', 'indices_signals', 'stocks_signals', 'crypto_signals'])
                ->make();

    }



// --------------------------------------------------------------------------- APPROVE USERS END --------------------------------------------------------------------------------------








// ----------------------------------------------------------------------------- USERS START -------------------------------------------------------------------------------------

    public function users()
    {
        
        if(logged_in()->account_id==='admin'){
            $manager = Agents::where('account_id','manager')->get();
        }
    
        if(logged_in()->account_id==='officemanager'){
            $manager = Agents::where('account_id','manager')->where('promo_code',logged_in()->promo_code)->get();
        }

        if(logged_in()->account_id==='teamleader'){
            $manager = Agents::where('account_id','manager')->where('teamleader',logged_in()->id)->get();
        }


        if(logged_in()->account_id==='caposala'){
            $manager = Agents::where('account_id', 'manager')->where('departament',logged_in()->departament)->where('promo_code',logged_in()->promo_code)->whereIn('manager_desk', logged_in()->desk)->get();
        }
        
               
        $statuses = Status::whereNotNull('id')->get();

     
        
        return view('admin.users')->with(['statuses'=>$statuses, 'manager'=>$manager]);

    }

    public function getUsersWithoutDeposit(Request $request)
    {

        if (logged_in()->account_id === 'admin'){

        $user = User::whereNotIn('account_id', ['manager','customer_service','officemanager','teamleader','affiliator','admin'])
            ->where('exclient', 0)
            ->where('recycle', 0)
            ->whereNotIn('id', function($query) {$query->select('user_id')->from('deposits');})
            ->orderBy('created_at','desc');

        }
        
        if (logged_in()->account_id === 'officemanager'){

            $user = User::whereNotIn('account_id', ['manager','customer_service','officemanager','teamleader','affiliator','admin'])
                ->where('exclient', 0)
                ->where('recycle', 0)
                ->where('promo_code', logged_in()->promo_code)
                ->whereNotIn('id', function($query) {$query->select('user_id')->from('deposits');})
                ->orderBy('created_at','desc');
    
        }


        
        if(logged_in()->account_id === 'teamleader'){
    
    
            $mng=Agents::where('account_id','manager')->where('teamleader', logged_in()->id)->select('id');
    
            $user = User::whereNotIn('account_id', ['manager','customer_service','officemanager','teamleader','affiliator','admin'])
                ->where('exclient', 0)
                ->where('recycle', 0)
                ->whereIn('manager', $mng)
                ->whereNotIn('id', function($query) {$query->select('user_id')->from('deposits');})
                ->orderBy('created_at','desc');
    

    }


           
    if(logged_in()->account_id === 'caposala'){
    
    
        $mng = Agents::where('account_id', 'manager')->where('departament',logged_in()->departament)->where('promo_code',logged_in()->promo_code)->whereIn('manager_desk', logged_in()->desk)->select('id');

        $user = User::whereNotIn('account_id', ['manager','customer_service','officemanager','teamleader','affiliator','admin'])
            ->where('exclient', 0)
            ->where('recycle', 0)
            ->whereIn('manager', $mng)
            ->whereNotIn('id', function($query) {$query->select('user_id')->from('deposits');})
            ->orderBy('created_at','desc');


}



        
    if (!empty($request->get('fromdate'))) {
        $user = $user->whereBetween('created_at', [$request['fromdate'], $request['todate']]);

    }

    if (!empty($request->get('status'))) {
        $user = $user->whereIn('status_id', $request->status);
    }

    if (!empty($request->get('name'))) {
        $user = $user->where('name','LIKE',"%{$request->name}%");
    }


    if (!empty($request->get('manager'))){

        $user = $user->whereIn('manager', $request->manager);
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

            ->addColumn('checkbox_new', function ($user) {

                $btn = '<input type="checkbox"  name="checkbox" onclick="checkUser_new(' . $user->id . ' ,' . $user->mt4_account . ' , event)">';

                return $btn;
            })

           

            ->addColumn('name', function ($user) {
                $btn = '<a href="'.url('admin/client/'.$user->id).'">' . $user->name . '</a>';

                return $btn;

            })

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



            ->addColumn('manager', function ($user) {
                $btn = ''.findManager($user->manager).'';

                return $btn;
            })

            ->rawColumns(['checkbox_new', 'name', 'action', 'manager', 'status'])
            ->make();

    }



// --------------------------------------------------------------------------- USERS END ---------------------------------------------------------------------------------------------------






//---------------------------------------------------------------------------- EXCLIENTS -------------------------------------------------------------------------------------------------



    public function exclients()
    {

        if(logged_in()->account_id==='admin'){
            $manager = Agents::where('account_id', 'manager')->get();
        }
    
        if(logged_in()->account_id==='officemanager'){
            $manager = Agents::where('account_id', 'manager')->where('promo_code',logged_in()->promo_code)->get();
        }

        if(logged_in()->account_id==='teamleader'){
            $manager = Agents::where('account_id', 'manager')->where('teamleader',logged_in()->id)->get();
        }

        if(logged_in()->account_id==='caposala'){
            $manager = Agents::where('account_id', 'manager')->where('departament',logged_in()->departament)->where('promo_code',logged_in()->promo_code)->whereIn('manager_desk', logged_in()->desk)->get();
        }


        $statuses = Status::whereNotNull('id')->get();

        return view('admin.exclients')->with(['statuses'=>$statuses, 'manager'=>$manager]);

    }

    public function getExclients(Request $request)
    {


        if(logged_in()->account_id === 'admin'){

            $user = User::where('exclient', 1)->where('recycle', 0)->orderBy('created_at','desc');

        }
    
    
        if(logged_in()->account_id === 'officemanager'){
    
        $user = User::where('promo_code', logged_in()->promo_code)->where('exclient', 1)->where('recycle', 0)->orderBy('created_at','desc');

        }


        if(logged_in()->account_id === 'teamleader'){
    
            $mng=Agents::where('account_id','manager')->where('teamleader', logged_in()->id)->select('id');
    
            $user = User::where('exclient', 1)->whereIn('manager', $mng);

    }



    if(logged_in()->account_id === 'caposala'){
    
        $mng = Agents::where('account_id', 'manager')->where('departament',logged_in()->departament)->where('promo_code',logged_in()->promo_code)->whereIn('manager_desk', logged_in()->desk)->select('id');
        $user = User::where('exclient', 1)->whereIn('manager', $mng);

}



        
          
    if (!empty($request->get('fromdate'))) {
        $user = $user->whereBetween('created_at', [$request['fromdate'], $request['todate']]);

    }

    if (!empty($request->get('status'))) {
        $user = $user->whereIn('status_id', $request->status);
    }

    if (!empty($request->get('name'))) {
        $user = $user->where('name','LIKE',"%{$request->name}%");
    }


    if (!empty($request->get('manager'))){

        $user = $user->whereIn('manager', $request->manager);
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

            ->addColumn('checkbox_new', function ($user) {

                $btn = '<input type="checkbox"  name="checkbox" onclick="checkUser_new(' . $user->id . ' ,' . $user->mt4_account . ' , event)">';

                return $btn;
            })

           

            ->addColumn('name', function ($user) {
                $btn = '<a href="'.url('admin/client/'.$user->id).'">' . $user->name . '</a>';

                return $btn;

            })

            ->addColumn('action', function ($user) {

                if (Cache::has('user-is-online-' . $user->id))
                    $btn3 = '<i class="fa fa-circle font-16 onlineStatus online"></i>';
                else
                    $btn3 = '<i class="far fa-circle font-16 onlineStatus offline"></i>';
                $btn1 = '<a onclick="delete_user_new(' . $user->id . ')"><i class="fa fa-times font-20 deleteUser"></i></a>';
                $btn2 = '<a href="'.url('login_user/'.$user->id).'"><i class="fa fa-user font-20"></i></a><input id="myInput' . $user->id . '" class="copyPassInput" value="' . $user->real_password . '"><i onclick="myFunction(' . $user->id . ')" title="' . $user->real_password . '" class="fa fa-eye  font-20 copyPassIcon"></i>';
                $btn5 = '<a href="'.url('/user_profile/'.$user->id).'"><i class="fa fa-user-tie m-l-10 font-20"></i></a>';
                $btn4 = '<div class="d-flex">' . $btn2 . ' ' . $btn5 . ' ' . $btn1 . ' ' . $btn3 . '</div>';

                return $btn4;
            })

   
            ->addColumn('status', function ($user) {
                $btn = ''.$user->status->status.'';

                return $btn;
            })


            ->addColumn('manager', function ($user) {
                $btn = ''.findManager($user->manager).'';

                return $btn;
            })

            ->rawColumns(['checkbox_new', 'name', 'action', 'manager' ,'status'])
            ->make();


    }



//--------------------------------------------------------------------------- EXCLIENTS END -------------------------------------------------------------------------------------------------







//---------------------------------------------------------------------------- EXCLIENTS -------------------------------------------------------------------------------------------------



    public function recycle()
    {
        if(logged_in()->account_id==='admin'){
            $manager = Agents::where('account_id', 'manager')->get();
            }
    
        if(logged_in()->account_id==='officemanager'){
            $manager = Agents::where('account_id', 'manager')->where('promo_code',logged_in()->promo_code)->get();
        }


        if(logged_in()->account_id==='teamleader'){
            $manager = Agents::where('account_id', 'manager')->where('teamleader',logged_in()->id)->get();
        }

        if(logged_in()->account_id==='caposala'){
            $manager = Agents::where('account_id', 'manager')->where('departament',logged_in()->departament)->where('promo_code',logged_in()->promo_code)->whereIn('manager_desk', logged_in()->desk)->get();
        }


        $statuses = Status::whereNotNull('id')->get();
        
        return view('admin.recycle')->with(['statuses'=>$statuses, 'manager'=>$manager]);

    }

    public function getRecycle(Request $request)
    {

        $user = User::where('recycle', 1)->orderBy('created_at','desc');


          
        if (!empty($request->get('fromdate'))) {
            $user = $user->whereBetween('created_at', [$request['fromdate'], $request['todate']]);

        }

        if (!empty($request->get('status'))) {
            $user = $user->whereIn('status_id', $request->status);
        }

        if (!empty($request->get('name'))) {
            $user = $user->where('name','LIKE',"%{$request->name}%");
        }


        if (!empty($request->get('manager'))){

            $user = $user->whereIn('manager', $request->manager);
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

            ->addColumn('checkbox_new', function ($user) {

                $btn = '<input type="checkbox"  name="checkbox" onclick="checkUser_new(' . $user->id . ' ,' . $user->mt4_account . ' , event)">';

                return $btn;
            })

            

            ->addColumn('name', function ($user) {
                $btn = '<a href="'.url('admin/client/'.$user->id).'">' . $user->name . '</a>';

                return $btn;

            })

            ->addColumn('action', function ($user) {

                if (Cache::has('user-is-online-' . $user->id))
                    $btn3 = '<i class="fa fa-circle font-16 onlineStatus online"></i>';
                else
                    $btn3 = '<i class="far fa-circle font-16 onlineStatus offline"></i>';
                $btn1 = '<a onclick="delete_user_new(' . $user->id . ')"><i class="fa fa-times font-20 deleteUser"></i></a>';
                $btn2 = '<a href="'.url('login_user/'.$user->id).'"><i class="fa fa-user font-20"></i></a><input id="myInput' . $user->id . '" class="copyPassInput" value="' . $user->real_password . '"><i onclick="myFunction(' . $user->id . ')" title="' . $user->real_password . '" class="fa fa-eye  font-20 copyPassIcon"></i>';
                $btn5 = '<a href="'.url('/user_profile/'.$user->id).'"><i class="fa fa-user-tie m-l-10 font-20"></i></a>';
                $btn4 = '<div class="d-flex">' . $btn2 . ' ' . $btn5 . ' ' . $btn1 . ' ' . $btn3 . '</div>';

                return $btn4;
            })


    
            ->addColumn('status', function ($user) {
                $btn = ''.$user->status->status.'';

                return $btn;
            })


            ->addColumn('manager', function ($user) {
                $btn = ''.findManager($user->manager).'';

                return $btn;
            })

            ->rawColumns(['checkbox_new', 'action', 'manager' ,'status'])
            ->make();

    }



//--------------------------------------------------------------------------- EXCLIENTS END -------------------------------------------------------------------------------------------------




















//---------------------------------------------------------------------------- CLIENTS -------------------------------------------------------------------------------------------------



    public function clients()
    {

        if(logged_in()->account_id==='admin'){
            $manager = Agents::where('account_id', 'manager')->get();
            }
    
            if(logged_in()->account_id==='officemanager'){
            $manager = Agents::where('account_id', 'manager')->where('promo_code',logged_in()->promo_code)->get();
            }
    
            if(logged_in()->account_id==='teamleader'){
                $manager = Agents::where('account_id', 'manager')->where('teamleader',logged_in()->id)->get();
            }

            if(logged_in()->account_id==='caposala'){
                $manager = Agents::where('account_id', 'manager')->where('departament',logged_in()->departament)->where('promo_code',logged_in()->promo_code)->whereIn('manager_desk', logged_in()->desk)->get();
            }
    
               

        $statuses = Status::whereNotNull('id')->get();

        return view('admin.clients')->with(['statuses'=>$statuses, 'manager'=>$manager]);

    }

    public function getClients(Request $request)
    {


        if(logged_in()->account_id === 'admin'){

        $user = User::whereNotIn('account_id', ['manager','customer_service','officemanager','teamleader','affiliator','admin'])
            ->where('exclient', 0)
            ->where('recycle', 0)
            ->whereIn('id', function($query) {$query->select('user_id')->from('deposits');})
            ->orderBy('created_at','desc');
        }


        if(logged_in()->account_id === 'officemanager'){

            $user = User::whereNotIn('account_id', ['manager','customer_service','officemanager','teamleader','affiliator','admin'])
                ->where('exclient', 0)
                ->where('recycle', 0)
                ->where('promo_code',logged_in()->promo_code)
                ->whereIn('id', function($query) {$query->select('user_id')->from('deposits');})
                ->orderBy('created_at','desc');
        }


        
        if(logged_in()->account_id === 'teamleader'){


            $mng=Agents::where('account_id','manager')->where('teamleader', logged_in()->id)->select('id');

            $user = User::whereNotIn('account_id', ['manager','customer_service','officemanager','teamleader','affiliator','admin'])
                ->where('exclient', 0)
                ->where('recycle', 0)
                ->whereIn('manager',$mng)
                ->whereIn('id', function($query) {$query->select('user_id')->from('deposits');})
                ->orderBy('created_at','desc');
            
        }
    
        
        if(logged_in()->account_id === 'caposala'){


            $mng = Agents::where('account_id', 'manager')->where('departament',logged_in()->departament)->where('promo_code',logged_in()->promo_code)->whereIn('manager_desk', logged_in()->desk)->select('id');

            $user = User::whereNotIn('account_id', ['manager','customer_service','officemanager','teamleader','affiliator','admin'])
                ->where('exclient', 0)
                ->where('recycle', 0)
                ->whereIn('manager',$mng)
                ->whereIn('id', function($query) {$query->select('user_id')->from('deposits');})
                ->orderBy('created_at','desc');
        }


       
        if (!empty($request->get('fromdate'))) {
            $user = $user->whereBetween('created_at', [$request['fromdate'], $request['todate']]);

        }

        if (!empty($request->get('status'))) {
            $user = $user->whereIn('status_id', $request->status);
        }

        if (!empty($request->get('name'))) {
            $user = $user->where('name','LIKE',"%{$request->name}%");
        }


        if (!empty($request->get('manager'))){

            $user = $user->whereIn('manager', $request->manager);
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

            ->addColumn('checkbox_new', function ($user) {

                $btn = '<input type="checkbox"  name="checkbox" onclick="checkUser_new(' . $user->id . ' ,' . $user->mt4_account . ' , event)">';

                return $btn;
            })



           

            ->addColumn('name', function ($user) {
                $btn = '<a href="'.url('admin/client/'.$user->id).'">' . $user->name . '</a>';

                return $btn;

            })

            ->addColumn('action', function ($user) {

                if (Cache::has('user-is-online-' . $user->id))
                    $btn3 = '<i class="fa fa-circle font-16 onlineStatus online"></i>';
                else
                    $btn3 = '<i class="far fa-circle font-16 onlineStatus offline"></i>';
               
                
                $btn5 = '<a href="'.url('/user_profile/'.$user->id).'"><i class="fa fa-user-tie m-l-10 font-20"></i></a>';
                $btn4 = '<div class="d-flex">' . $btn5 . ' ' . $btn3 . '</div>';

                return $btn4;
            })

//
            ->addColumn('call', function ($user) {

                $btn = '<a onclick="sipCall(\'call-audio\', \' 991010'.$user->country_code.''.$user->phone.' \')"><i class="fa fa-phone font-20 callIcon"></i></a>';

                return $btn;

            })



            ->addColumn('status', function ($user) {
                $btn = ''.$user->status->status.'';

                return $btn;
            })

    
            
            ->addColumn('manager', function ($user) {
                $btn = ''.findManager($user->manager).'';

                return $btn;
            })



            ->rawColumns(['checkbox_new', 'name', 'action', 'manager', 'status'])
            ->make();

    }



//--------------------------------------------------------------------------- CLIENTS END --------------------------------------------------------------------------------------------------------









//---------------------------------------------------------------------------- LEADS -------------------------------------------------------------------------------------------------



    public function leads()
    {
        
        if(logged_in()->account_id==='admin'){
        $manager = Agents::where('account_id', 'manager')->get();
        }

        if(logged_in()->account_id==='officemanager'){
        $manager = Agents::where('account_id', 'manager')->where('promo_code',logged_in()->promo_code)->get();
        }

        if(logged_in()->account_id==='teamleader'){
            $manager = Agents::where('account_id', 'manager')->where('teamleader',logged_in()->id)->get();
        }

        if(logged_in()->account_id==='caposala'){
            $manager = Agents::where('account_id', 'manager')->where('promo_code',logged_in()->promo_code)->whereIn('manager_desk', logged_in()->desk)->get();
            // $mng = json_decode(logged_in()->desk, true);
           
            
        }

        if(logged_in()->account_id==='affiliator'){
            $manager = null;
        }

        
        $statuses = Status::whereNotNull('id')->get();
        return view('admin.leads')->with(['statuses'=>$statuses, 'manager'=>$manager]);

    }

    public function getLeads(Request $request)
    {

        if(logged_in()->account_id==='admin'){
        
        $user = ImportCsv::whereNotNull('phone')
            ->orderBy('created_at','desc');
        }
        

        if(logged_in()->account_id==='officemanager'){


        $user = ImportCsv::whereNotNull('phone')->where('leads.promo_code', logged_in()->promo_code)->orderBy('created_at','desc')->get();

        }


        
        if(logged_in()->account_id==='teamleader'){


            $mng=Agents::where('account_id','manager')->where('teamleader', logged_in()->id)->select('id');

            $user = ImportCsv::whereNotNull('phone')->whereIn('manager', $mng)->orderBy('created_at','desc')->get();
    
        }



        if(logged_in()->account_id==='caposala'){




            $mng = Agents::where('account_id', 'manager')->where('promo_code',logged_in()->promo_code)->whereIn('manager_desk', logged_in()->desk)->select('id');

            $user = ImportCsv::whereNotNull('id')->whereIn('manager', $mng)->orderBy('created_at','desc');
    
        }



        if (!empty($request->get('fromdate'))) {
            $user = $user->whereBetween('created_at', [$request['fromdate'], $request['todate']]);

        }

        if (!empty($request->get('fromassigneddate'))) {
            $user = $user->whereBetween('assigned_date', [$request['fromassigneddate'], $request['toassigneddate']]);

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


        if (!empty($request->get('manager'))){

            $user = $user->whereIn('manager', $request->manager);
        }


        if (!empty($request->get('phone'))){

             $user = $user->where('phone', $request->phone);
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



            ->addColumn('first_name', function ($user) {
                $btn = '<a href="'.url('lead_profile/'.$user->id).'">' . $user->first_name . '</a>';

                return $btn;

            })




            ->addColumn('call', function ($user) {

                $btn = '<a onclick="sipCall(\'call-audio\', \''.logged_in()->sip.$user->phone.'\')"><i class="fa fa-phone font-20 callIcon"></i></a>';

                return $btn;

            })



            ->addColumn('status', function ($user) {
                $btn = ''.$user->status->status.'';

                return $btn;
            })



            ->addColumn('manager', function ($user) {
                $btn = ''.findManager($user->manager).'';

                return $btn;
            })



            ->rawColumns(['checkbox_new', 'action','first_name', 'call', 'email', 'status' , 'manager'])
            ->make();
    }



//--------------------------------------------------------------------------- LEADS END --------------------------------------------------------------------------------------------------------



    public function approve_managers()
    {
        $users=Agents::whereNotNull('id')->orderByDesc('account_id')->get();
//        $users=User::where('account_id', 'manager')->get();
        return view('admin.managers_approve')->with(['users'=>$users]);

    }



    public function getUsers(){

        if(logged_in()->account_id==='admin'){
        $users=User::all();
        }

        if(logged_in()->account_id==='officemanager'){
        $users=User::where('promo_code',logged_in()->promo_code)->get();
        }


        if(logged_in()->account_id==='teamleader'){

            $mng=Agents::where('account_id','manager')->where('teamleader', logged_in()->id)->select('id');

            $users=User::whereNotNull('id')->whereIn('manager',$mng)->get();
        }

        return response()->json($users);
    }


    public function getManagerUsers(){
        $users=User::where('manager', logged_in()->id)->get();
        return response()->json($users);
    }




    public function set_promo_amount(Request $request)
    {
        User::where('id',logged_in()->id)->update(['promo_amount'=>$request['promo_amount'],'real_promo'=>1]);

        return redirect()->action('HomeController@promo_index_guard');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function userOnlineStatus()
    {
        $users = User::all();

        foreach ($users as $user) {
            if (Cache::has('user-is-online-' . $user->id))
                echo "User " . $user->name . " is online.";
//            else
//                echo "User " . $user->name . " is offline.";
        }
    }


    public function send_email(Request $request){

        $this->validate($request, [
                'user_id' => 'required',
                'subject' => 'required',
                'content' => 'required',
                'email' => 'required',
            ]
        );

        $email = new SendgridEmail();
        $email->type = 'out';
        $email->from_email= logged_in()->email;
        $email->to_email= $request['email'];
        $email->subject= $request['subject'];
        $email->email_text= $request['content'];
        $email->save();


        $data=$request->all();
        Mail::to($data['email'])->send(new UserMail($data));

    }


    public function send_email_fields(Request $request){

        $email = new SendgridEmail();
        $email->type = 'out';
        $email->from_email= $request['from_email'];
        $email->to_email= $request['to_email'];
        $email->subject= $request['subject'];
        $email->email_text= $request['content'];
        $email->save();

        $data=$request->all();
        Mail::to($data['to_email'])->send(new SimpleMail($data));

    }

    public function send_multi_email(Request $request){

        $data=$request->all();
//        return $data['users'][2];

        foreach ($data['users'] as $user){
            if (isset($user['email'])) {
//                return $user->email;
                Mail::to($user['email'])->send(new UserMail($data));
            }
        }

        return $request->all();
            //
//            Mail::to($user->email)->send(new DepositEmail($bank));
//        }
    }

//    public function assign_multi_users(Request $request){
//
//        $data=$request->all();
//        return $data;
//
//        foreach ($data['users'] as $user){
//            if (isset($user['id'])) {
//             $manager = User::where('id', $user['id'])->get;
//                $manager->manager = $user['managers'];
//                $manager->save();
//            }
//        }
//
//        return $request->all();
//        }


    public function send_registration_email(Request $request){
//
////                return $request['data']->email;
//                Mail::to($request['data']->email)->send(new RegistrationEmail($request['data']->mt4_account, $request['data']->mt4_password, $request['data']));

        $data=$request->all();
//        return $data['users'][2];


        foreach ($data['users'] as $user){
            if (isset($user['mt4_password'])) {
                Mail::to($user['email'])->send(new RegistrationEmail($user['mt4_account'], $user['mt4_password'], $user));
                return $request->all();
            }
            else
            {
                return response()->json([
                    'status'=> 'error',
                    'name'=> $user['name']
                ]);
            }

        }



    }



    public function get_managers(){


      

        if(logged_in()->account_id==='admin'){
            $manager = Agents::where('account_id', 'manager')->get();
            }
    
        if(logged_in()->account_id==='officemanager'){
            $manager = Agents::where('account_id', 'manager')->where('promo_code', logged_in()->promo_code)->get();
        }

        if(logged_in()->account_id==='teamleader'){
            $manager = Agents::where('account_id', 'manager')->where('teamleader', logged_in()->id)->get();
        }

        return $manager;


        return response()->json($manager);

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function show($id)
    {
       
        $user=User::findOrFail($id);
        

        // if ($user->mt4_account) {
        //     $account=$this->getAccount($this->allAccounts(), $user->mt4_account);
        //     $margin=$this->getMargin($user->mt4_account);
        //     $credit = $account->Credit;
         
        // }

        $promocode=PromoCode::all();
        $login_ip=Userip::where('user_id', $user->id)->limit('7')->get();
        $manager=Agents::where('id',$user->manager)->select('name')->first();
        $managers=Agents::where('account_id','manager')->get(); 

        
        return view('admin.user_single')->with(['user'=>$user, 'login_ip'=>$login_ip, 'promocode'=>$promocode, 'managers'=>$managers,'manager' => $manager]);
    }




    public function showmanager($id)
    {

        $user=Agents::findOrFail($id);
        $desk= $user->desk;
        // foreach ($desk as $deskk) {
        //     dd(findDesk($deskk));
        // }
        $desks = Desks::whereNotNull('id')->get();
        $teamleader=Agents::where('id',$user->teamleader)->select('name')->first();
        $login_ip=Userip::where('user_id', $user->id)->limit('7')->get();
        $promocode=PromoCode::all();
        $teamleaders=Agents::where('account_id','teamleader')->get(); 
        return view('admin.manager_single')->with(['user'=>$user, 'login_ip'=>$login_ip, 'promocode'=>$promocode,'teamleaders'=>$teamleaders,'teamleader' => $teamleader,'desk'=>$desk, 'desks'=>$desks]);
    }




    public function user_profile($id)
    {
        //
        $user=User::where('id',$id)->first();
        $statuses=Status::all();
        $comments=Comment::where('user_id', $id)->get();
        

        if(logged_in()->account_id==='admin'){
            return view('admin.user_profile')->with(['user'=>$user,'statuses'=>$statuses, 'comments'=>$comments]);
        }
    
        if(logged_in()->account_id==='manager'){
          if($user->manager === logged_in()->id){
            return view('admin.user_profile')->with(['user'=>$user,'statuses'=>$statuses, 'comments'=>$comments]);
          }  
        }


        if(logged_in()->account_id==='officemanager'){
            if($user->promo_code == logged_in()->promo_code){
              return view('admin.user_profile')->with(['user'=>$user,'statuses'=>$statuses, 'comments'=>$comments]);
            }  
          }

        if(logged_in()->account_id==='teamleader'){

            $manager = Agents::where('account_id', 'manager')->where('teamleader', logged_in()->id)->select('id')->get();
            if ($manager->contains($user->manager)){
                return view('admin.user_profile')->with(['user'=>$user,'statuses'=>$statuses, 'comments'=>$comments]);
            }
        }


        if(logged_in()->account_id==='caposala'){

            $manager1 = Agents::where('account_id', 'manager')->where('promo_code',logged_in()->promo_code)->whereIn('manager_desk', logged_in()->desk)->get();

            if ($manager1->contains($user->manager)){
                return view('admin.user_profile')->with(['user'=>$user,'statuses'=>$statuses,'comments'=>$comments]);

            }  
          }


        

    }



    public function lead_profile($id)
    {
        //
        $user=ImportCsv::findOrFail($id);

        $statuses=Status::all();

        $manager = findManager($user->manager);


        if(logged_in()->account_id==='admin'){
            return view('admin.lead_profile')->with(['user'=>$user,'statuses'=>$statuses,'manager'=>$manager]);

        }
    
        if(logged_in()->account_id==='manager'){
          if($user->manager === logged_in()->id){
            return view('admin.lead_profile')->with(['user'=>$user,'statuses'=>$statuses,'manager'=>$manager]);

          }  
        }


        if(logged_in()->account_id==='officemanager'){
            if($user->promo_code == logged_in()->promo_code){
                return view('admin.lead_profile')->with(['user'=>$user,'statuses'=>$statuses,'manager'=>$manager]);

            }  
          }

          if(logged_in()->account_id==='teamleader'){

            $manager1 = Agents::where('account_id', 'manager')->where('teamleader', logged_in()->id)->select('id')->get();
            if ($manager1->contains($user->manager)){
            
                return view('admin.lead_profile')->with(['user'=>$user,'statuses'=>$statuses,'manager'=>$manager]);
            }
           
        }

        if(logged_in()->account_id==='caposala'){

            $manager1 = Agents::where('account_id', 'manager')->where('promo_code',logged_in()->promo_code)->whereIn('manager_desk', logged_in()->desk)->get();

            if ($manager1->contains($user->manager)){
                return view('admin.lead_profile')->with(['user'=>$user,'statuses'=>$statuses,'manager'=>$manager]);

            }  
          }

//        $comments=Comment::where('user_id', $user->id)->get();

      
    }



    public function get_calendar_events(Request $request){
        if (logged_in()->account_id === 'manager')
            $events=Calendar::where('user_id', logged_in()->id)->where('client_id', $request['id'])->where('real_user', 1)->orderByDesc('created_at')->get();
        elseif (logged_in()->account_id === 'admin')
            $events=Calendar::where('client_id', $request['id'])->where('real_user', 1)->orderByDesc('created_at')->get();

        return response()->json($events);
    }


    public function get_leads_events (Request $request){
       
            $events=Calendar::where('client_id', $request['id'])->where('real_user', $request['real_user'])->orderByDesc('created_at')->get();

        if (logged_in()->account_id === 'manager'){
            $events=Calendar::where('user_id', logged_in()->id)->where('client_id', $request['id'])->where('real_user',  $request['real_user'])->orderByDesc('created_at')->get();
        }
        return response()->json($events);
    }



      public function get_comments(Request $request){

          $comments=Comment::where('user_id', $request['id'])->where('real_user',1)->orderByDesc('created_at')->get();
          $allInfo=array('comments'=>$comments);
          return response()->json($allInfo);
}


      public function get_phone(Request $request){

        if ($request['real_user'] === 1)
        $user = User::where('id', $request['id'])->select('phone')->first();
        else
        $user = ImportCsv::where('id', $request['id'])->select('phone')->first();

          return $user;
    }


    public function get_lead_comments(Request $request){

        $comments=Comment::where('user_id', $request['id'])->where('real_user',0)->orderByDesc('created_at')->get();
        $allInfo=array('comments'=>$comments);
        return response()->json($allInfo);
    }


    public function change_status(Request $request){

        if ($request['real_user'] === 1)
        $user=User::findOrFail($request['id']);
        else $user=ImportCsv::findOrFail($request['id']);

        $user->update([
            'status_id' => $request['status']
        ]);
        return $user;
    }




    public function managers_form()
    {

//        $form_data = FormData::where('manager_id',logged_in()->id)->get();
        $new='';
        return view('admin.manager_reports')->with(['new'=>$new]);
    }












    public function create_note(Request $request){

        if ($request['real_user'] === 1)
            $user=User::findOrFail($request['id']);
        else $user=ImportCsv::findOrFail($request['id']);
        $user->update(['note' => $request['note']]);
        return $user;
    }





    public function delete_comment(Request $request){

            $comment=Comment::where('id',$request['id'])->where('real_user',$request['real_user'])->delete();

        return $comment;
    }


    public function get_comment(Request $request){

        $comment=Comment::where('id',$request['id'])->get();
        return $comment;
    }



    public function update_comment(Request $request){

        $comment=Comment::where('id',$request['id'])->update([
            'comment'=>$request['comment']
        ]);
        return $comment;
    }

    public function updateeeeeeee(Request $request){
//        dd($request);
        $status=Status::where('id',$request['id'])->update([
            'status'=>$request['status']
        ]);
        return $status;
    }



    public function create_comment(Request $request){

        $comment= new Comment;
        $comment->user_id=$request['user_id'];
        $comment->manager_name=$request['name'];
        $comment->comment=$request['comment'];
        $comment->real_user=$request['real_user'];
        $comment->save();

//        return $comment;
        if ($request['real_user']) {
        User::where('id', $request['user_id'])->update(['updated_at'=>Carbon::now()]);
        }
        else{
        ImportCsv::where('id', $request['user_id'])->update(['updated_at'=>Carbon::now()]);
        }
    }




  

    public function projects(){
        if (hasguard('admin'))
        {
            $users=User::all();

            $projects= Project::all();
        }
        else{
            $users=array();
            $projects= Project::where('user_id', logged_in()->id)->get();
        }

        return view('user.projects')->with(['projects'=>$projects, 'users'=>$users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

        $this->validate($request,[
            'name'=>'required|string|max:255',
            'email'=>'required|email|string|max:255',
            'address'=>'required|string|max:255',
            'city'=>'required|string|max:255',
            'country'=>'required|string|max:255',
            'country_code'=>'nullable|string|max:255',
            'phone'=>'nullable|min:7|regex:/^([0-9\s\-\+\(\)]*)$/',
//            'password'=>'required|confirmed|min:6',

        ],
            [
//                'required' => 'Il campo \':attribute\' è richiesto.',
//                'password.confirmed' => 'Password e Conferma Password sono differenti!',
//                'password.min' => 'La password deve essere minimo 6 caratteri!',
              
            ]);

        //        todo improve update

        User::where('id', logged_in()->id)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'password' => Hash::make($request->input('real_password')),
            'real_password' => $request->input('real_password'),
            'city' => $request->input('city'),
            'country' => $request->input('country'),
            'country_code' => $request->input('country_code'),
            'phone' => $request->input('phone'),
//            'password' => Hash::make($request->password),
//            'email_verified_at' => now(),
        ]);

        $mt4=logged_in()->mt4_account;
        $pwd=$request->input('real_password');

            $this->changeMT4Password($mt4,$pwd);
       
        return redirect()->action('HomeController@index');

    }

   

    public function set_read_project(Request $request){
        $project=Project::find($request['id']);
        $project->read=1;
        $project->save();
        return $project;
    }



    public function change_password(Request $request){

        $this->validate($request, [
            'password_old'=>'required|min:8',
            'password'=>'required|confirmed|min:6',
        ],
            [
                'password.required' => ':attribute is required',
//                'password.confirmed' => 'Password e Conferma Password sono differenti!',
                'min' => ':attribute deve essere minimo 6 caratteri!',
            ]);

            if (Hash::check($request['password_old'], logged_in()->password)){

                $user = User::where('id', logged_in()->id)->update([
                    'password' => Hash::make($request['password']),
                    'real_password' => $request['password']
                ]);

                if (empty($user)) {
                    return response()->json([
                        'status' => 'error',
                        'msg' => 'User not found',
                    ], 400);
                }

                return response()->json([
                    'status' => 'success',
                    'msg' => 'Password changed',
                ]);
            }
            else
            {
                return response()->json([
                    'status' => 'error',
                    'msg' => 'Old password is wrong',
                ]);
            }
    }

    public function drop_files(Request $request){

        $input = $request->all();

        $this->validate($request,[
//                'category_id'=>'required',
//                'quesito'=>'required',
//                'privacy'=>'required',
                'file'=>'mimes:jpeg,jpg,bmp,png,gif,doc,docx,pdf,ppt,pptx,xls,xlsx,zip|max:5120',
            ],
                [
                    'file.mimes' => 'File format not allowed',
                    'file.max' => 'Max file upload size is 5Mb'
                ]);

        $file = $request->file('file');

        $filenameWithExt = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $directory = storage_path().'uploads/'.sha1(time());
        $filename = $filenameWithExt.time().".{$extension}";
        $filename =pathinfo($filenameWithExt,PATHINFO_FILENAME);
        $fileNameToStore = $filename.'_'.time().'.'.$extension;

        $path = $file->move(storage_path('uploads/'.logged_in()->name), $fileNameToStore);

        $uploads = new Upload;
        $uploads->filename = $fileNameToStore;
        $uploads->user_id = logged_in()->id;
        $uploads->type = $extension;
        $uploads->file_type = $request['file_type'];
        $uploads->save();

        return response()->json(['success'=>$fileNameToStore]);

        if( $path ) {
            return response()->json('success', 200);
        } else {
            return response()->json('error', 400);
        }
    }

    public function fileDestroy(Request $request)
    {
        $filename =  $request->get('filename');
        Upload::where('filename',$filename)->delete();
        $path=storage_path('uploads/'.logged_in()->name.'/'.$filename);
        if (file_exists($path)) {
            unlink($path);
        }
        return $filename;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function getFile($id){
        $upload=Upload::findOrFail($id);
        $user=$upload->user;

        return ToolsRepository::getFile($upload);
    }

    public function destroy($id)
    {
        //
    }

    public function webtrader(){
        return view('user.webtrader');
    }
}
