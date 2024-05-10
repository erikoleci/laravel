<?php

namespace App\Http\Controllers;

use App\Account;
use App\Closure;
use App\Deposit;
use Notification;
use App\Deposit_request;
use App\FormData;
use App\ImportCsv;
use App\AllowedIp;
use App\Imports\CsvImport;
use App\Mail\ClosureEmail;
use App\Mail\DepositEmail;
use App\Mail\RegistrationEmail;
use App\Mail\TransactionEmail;
use App\PaymentsRepository;
use App\Project;
use App\Status;
use App\Survey;
use App\Comment;
use App\ToolsRepository;
use App\Traits\AccountsTrait;
use App\Transaction_logs;
use App\Upload;
use App\User;
use App\Agents;
use App\Desks;
use App\PromoCode;
use App\Notifications\LeadsSent;
use App\Withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Tenfef\IPFind\APIErrorException;
use Tenfef\IPFind\InvalidIPAddressException;
use Tenfef\IPFind\IPFind;
use Tenfef\IPFind\UnexpectedResponseException;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    use AccountsTrait;

    public function __construct()
    {
            $this->middleware('auth:admin', ['except' => [
                'calendar','assign_multi','login_user'
            ]]);
        
    }

    public function index()
    {
        //
        if (hasguard('admin'))
        {
            logout_except('admin');
        }
//        return get_guard();
        $users_tot=User::whereNotNull('id')->orderByDesc('created_at')->get();
        $users=User::whereNotNull('id')->whereMonth('created_at', '=', now()->startOfMonth())->orderByDesc('created_at')->get();
        $withdraws=Withdraw::whereNotNull('id')->whereMonth('created_at', '=', now()->startOfMonth())->get();
        $withdraw_total=Withdraw::whereNotNull('id')->get();

        $dep_daily = Deposit::where('created_at', '>=', \Carbon\Carbon::now()->subMonth())

            ->groupBy('date')->orderBy('created_at', 'DESC')->get(array(DB::raw('Date(created_at) as date'), DB::raw('SUM(source_amount) as "amount"')));

        $dates=array();
        $sums=array();


        foreach($dep_daily as $dep)
        {
            if ($dep['date'])

            {
                array_push($dates, $dep['date']);
            }

            if ($dep['amount'])
            {
                array_push($sums, $dep['amount']);
            }
        }

        $totalDep=array('dates'=>$dates, 'sums'=>$sums);
//                $dep_bank = Deposit::where('source','bank')->whereMonth('created_at', '=', \Carbon\Carbon::now()->subMonth())->get();
        $dep_bank = Deposit::where('source','bank')->whereMonth('created_at', '=', now()->startOfMonth())->get();
        $dep_bank_total = Deposit::where('source','bank')->get();
        $dep_card = Deposit::where('source','Card')->whereMonth('created_at', '=', now()->startOfMonth())->get();
        $dep_card_total = Deposit::where('source','credit_card')->orWhere('source','Card')->get();
        $usr_it = User::where('country','Italy')->count();
        $usr_gr = User::where('country','Greece')->count();
        $usr_es = User::where('country','Spain')->count();
        $usr_de = User::where('country','Germany')->count();

        return view('admin.home_dashboard')->with(['users_total'=>$users_tot, 'users'=>$users,'withdraws'=>$withdraws, 'withdraw_total'=>$withdraw_total, 'dates'=>$totalDep, 'deposits_daily'=>$totalDep, 'deposit'=>$dep_bank, 'bank_total'=>$dep_bank_total, 'card_total'=>$dep_card_total, 'depos_card'=>$dep_card, 'uit'=>$usr_it, 'ugr'=>$usr_gr, 'ues'=>$usr_es, 'ude'=>$usr_de]);

    }

    public function login_user($id){

        $user=User::find($id);
        Auth::guard($user->account_id)->loginUsingId($id);
        return redirect()->action('HomeController@index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function transactions_logs(){
        if (hasguard('admin'))
        {
            logout_except('admin');
        }
        $transactions_logs=Transaction_logs::all();
        return view('admin.transactions_logs')->with(['transactions'=>$transactions_logs]);
    }

    public function deposits(){
        $deposits=Deposit::all();
        return view('admin.deposits')->with(['deposits'=>$deposits]);
    }

    public function home_dashboard(){
       return view('admin.home_dashboard');
    }

    public function totalprojects()
    {
        $total_users = User::all();
        return view('admin.users_list')->with(['total'=>$total_users]);
    }

    public function totalwithdraws()
    {
        $total_withdraws = Withdraw::all();
        return view('admin.withdraws')->with(['withdraw'=>$total_withdraws]);
    }


    public function withdraws_list(){
        $withdraws=Withdraw::all();
        return view('admin.withdraws')->with(['withdraws'=>$withdraws]);
    }

    public function surveys_list(){
        $surveys=Survey::all();
        return view('admin.surveys')->with(['surveys'=>$surveys]);
    }

    public function deposit_requests(){
        $requests=Deposit_request::all();
        return view('admin.deposit_requests')->with(['requests'=>$requests]);
    }







    public function assign_multi(Request $request){

        $data=$request->all();
//        $assign_manager;
        $i = 0;

        $LeadsData = [
            'assign_limit' => $data['assign_limit'],
            'real_user' => $data['real_user']
        ];

        if ($data['real_user'] === 0) {

        foreach ($data['users'] as $user){
                if ($i < $data['assign_limit'])
                $assign_manager = ImportCsv::where('id', $user)->update([
                    'manager'=>$request['managers'],
                    'assigned_date'=>Carbon::now()]);
                    $i++;

        }
        $user=Agents::where('id',$request['managers'])->first();
      
        // Notification::send($user, new LeadsSent($LeadsData));
    }


        elseif ($data['real_user'] === 1) {

            foreach ($data['users'] as $user){
                if ($i < $data['assign_limit'])
                $assign_manager = User::where('id', $user)->update([
                    'manager'=>$request['managers']]);
                $i++;

            }
            $user=Agents::where('id',$request['managers'])->first();
      
            // Notification::send($user, new LeadsSent($LeadsData));
        }    

        return $assign_manager;
    }



        public function delete_multi_comments(Request $request){

        $data=$request->all();
        $i = 0;

        $LeadsData = [
            'real_user' => $data['real_user']
        ];

    

        foreach ($data['users'] as $user){
                $deletecomments = Comment::where('user_id', $user)->where('real_user',$data['real_user'] )->delete();
                $i++;

        }
    

        return $deletecomments;
    }

    public function change_status_multi(Request $request){

        $data=$request->all();

        $i = 0;

        if ($data['real_user'] === 0)

            foreach ($data['users'] as $user){
                if ($i < $data['assign_limit'])
                    $status = ImportCsv::where('id', $user)->update([
                        'status_id'=>$request['selected_status']]);
                $i++;

            }


        elseif ($data['real_user'] === 1)

            foreach ($data['users'] as $user){
                if ($i < $data['assign_limit'])
                $status = User::where('id', $user)->update([
                    'status_id'=>$request['selected_status']]);
                $i++;

            }

        return $status;
    }




    public function delete_multi(Request $request){

        $data=$request->all();

        $i = 0;

        if ($data['real_user'] === 0)

            foreach ($data['users'] as $user){
                if ($i < $data['assign_limit'])
                    $delete = ImportCsv::where('id', $user)->delete();
                $i++;

            }


        elseif ($data['real_user'] === 1)

            foreach ($data['users'] as $user){
                if ($i < $data['assign_limit'])
                $delete = User::where('id', $user)->delete();
                $i++;

            }

        return $delete;
    }



    public function withdraw_status(Request $request){
        $this->validate($request,[
            'withdraw_id'=>'required',
            'status'=>'required']);

        $changeStatus = Withdraw::where('id',$request['withdraw_id'])->update([
            'status'=>$request['status']
        ]);

        return $changeStatus;
    }


    public function set_closure(Request $request){
        $this->validate($request,[
            'user_id'=>'required',
            'active'=>'required']);


        $user=User::find($request['user_id']);

        $status=null;

        if ($request['active']===1)
            $accountStatus=1;
        else
        {
            $accountStatus=0;
            // Mail::to($user->email)->send(new ClosureEmail());
        }

        $mt4Status=$this->changeStatusUser($user->mt4_account, $accountStatus);

        if(!$mt4Status){
            return response()->json([
                'status' => 'error',
                'msg' => 'Error changing status',
            ], 400);
        }

        $changeClosure = User::where('id',$request['user_id'])->update([
            'active'=>$request['active']
        ]);

        return $changeClosure;

    }

    public function user_status(Request $request){
        $this->validate($request,[
            'user_id'=>'required',
            'value'=>'required']);

        $user=User::find($request['user_id']);

        $status=null;

        if ($request['value'])
            $accountStatus=1;
        else
        {
            $accountStatus=0;
        }

        $mt4Status=$this->changeStatusUser($user->mt4_account, $accountStatus);

        if(!$mt4Status){
            return response()->json([
                'status' => 'error',
                'msg' => 'Error changing status',
            ], 400);
        }

        $changeStatus = User::where('id',$request['user_id'])->update([
            'active'=>$request['value']
        ]);

        return $changeStatus;
    }



    public function user_real(Request $request){
        $this->validate($request,[
            'user_id'=>'required',
            'value'=>'required']);

        $changePromo = User::where('id',$request['user_id'])->update([
            'real_promo'=>$request['value']
        ]);

        return $changePromo;
    }



    public function change_teamleader(Request $request){
        $this->validate($request,[
            'user_id'=>'required',
            'teamleader'=>'required']);

        $teamleader = User::where('id',$request['user_id'])->update(['teamleader'=>$request['teamleader']]);

        return $teamleader;
    }



    public function get_teamleaders(Request $request){
        

        $teamleader = User::where('account_id','teamleader')->select('id', 'name')->orderBy('created_at','desc')->get();
       

        return response()->json($teamleader);
    }


    public function user_formation(Request $request){
        $this->validate($request,[
            'user_id'=>'required',
            'value'=>'required']);

        $changePromo = User::where('id',$request['user_id'])->update([
            'formation'=>$request['value']
        ]);

        return $changePromo;
    }

    public function getAllAccounts(){
        $accounts=Account::all();
        return response()->json($accounts);
    }

    public function projects(){
        $projects= Project::all();
        return view('user.projects')->with(['projects'=>$projects, 'users'=>$users]);
    }

    public function save_projects(Request $request){

//        UPLOAD FILE

//        $fileNameToStore=null;
//        if ($request->hasFile('file')) {
//            $file = $request->file('file');
//
//            $filenameWithExt = $file->getClientOriginalName();
//            $extension = $file->getClientOriginalExtension();
//            $directory = storage_path() . 'uploads/' . sha1(time());
//            $filename = $filenameWithExt . time() . ".{$extension}";
//            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
//            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
//
//            $path = $file->move(storage_path('app/public/projects/'), $fileNameToStore);
//
//        }


//        UPLOAD FILE


        $project=new Project;
        $project->title=$request['title'];
        $project->user_id=$request['user_id'];
        $project->category=$request['category'];
        $project->content=$request['content'];
        $project->url=$request['url'];

        $project->save();

        return redirect()->back();
    }


    public function create_new_manager(Request $request){


       
        

             $user= Agents::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'account_id' => $request['account_id'],
            'password' => Hash::make($request['password']),
            'real_password' => $request['password'],
            'promo_code' => $request['promo_code'],
            'desk' => $request['desk'],
            'manager_desk' => $request['manager_desk'],
            'departament' => $request['departament'],
            'active' => 1,
            'teamleader'=>0,
            ]);

            return response()->json([
                'user' => $user,
                'message' => 'Success'
              ], 200);
            

            }


            public function createLead(Request $request){


       
        

                $lead= ImportCsv::create([
               'first_name' => $request['first_name'],
               'last_name' => $request['last_name'],
               'email' => $request['email'],
               'source' => $request['source'],
               'phone' => $request['phone'],
               'manager' => $request['manager'],
               'country' => $request['country'],
               ]);
   
               return  $lead;
               
   
               }

    public function saveBankDeposit(Request $request){
        $this->validate($request,[
            'user_id'=>'required',
            'amount'=>'required|integer|min:0',
            'type'=>'string'
//            'full_name_bank'=>'required|string|max:255',
//            'email_transaction'=>'required',
//            'whatsapp'=>'required',
        ]
        );

        if ($request['type']==='negative') {
            $insertMt4Deposit = $this->createWithdraw($request['user_id'], $request['amount']);
        }
        else{
            $insertMt4Deposit = $this->createDeposit($request['user_id'], $request['amount'], $request['description']);
        }

        $insertTransactionLog = PaymentsRepository::insert_bank_transaction_log($request['user_id'], $request, 'EUR');

        $insertBankPayment=PaymentsRepository::insertDepositBank($request, $request['user_id'], $insertTransactionLog->id);
        if ($request->has('collateral')&&($request['collateral']!==null)) {
            $insertCollateral = PaymentsRepository::insertCollateral($request['collateral'], $request['user_id'], $insertBankPayment->id, 'positive');
        }

        $user= User::where('id', $request['user_id'])->first();

        $email= $user->email;
       
        $amount= $request['amount'];
        
        // Mail::to($email)->send(new TransactionEmail($email,$amount));


        return response()->json('successful');

    }


    public function saveBankDepositNew(Request $request){
        $this->validate($request,[
            'user_id'=>'required',
            'amount'=>'required|integer|min:0',
            'type'=>'string'
//            'full_name_bank'=>'required|string|max:255',
//            'email_transaction'=>'required',
//            'whatsapp'=>'required',
        ]
        );

        if ($request['type']==='negative') {
            $insertMt4Deposit = $this->createWithdraw($request['user_id'], $request['amount']);
        }
        else{
            $insertMt4Deposit = $this->createDeposit($request['user_id'], $request['amount'], $request['description']);
        }

        $insertTransactionLog = PaymentsRepository::insert_bank_transaction_log($request['user_id'], $request, 'EUR');

        $insertBankPayment=PaymentsRepository::insertDepositBank($request, $request['user_id'], $insertTransactionLog->id);
        if ($request->has('collateral')&&($request['collateral']!==null)) {
            $insertCollateral = PaymentsRepository::insertCollateral($request['collateral'], $request['user_id'], $insertBankPayment->id, 'positive');
        }

        $user= User::where('id', $request['user_id'])->first();

        $email= $user->email;
       
        $amount= $request['amount'];
        
        // Mail::to($email)->send(new TransactionEmail($email,$amount));


        return response()->json('successful');

    }


    public function checkDeposit (){

        $users = User::where('check_deposit',1)->get();
        foreach ($users as $key => $user){

            if ($user->deposits->isEmpty()) {
                $dateRegister= $user->created_at;
                $dateNow = \Carbon\Carbon::now();
                $days = $dateNow->diffInDays($dateRegister);

                if ($days > 7){

                    $user->active = 0;
                    $user->check_deposit = 0;
                    $mt4Status=$this->changeStatusUser($user->mt4_account, 0);

                    $user->save();


                }

            }

        }
        return redirect()->back();
    }



    public function uploads(){


        return view('admin.uploads');
    }

    public function get_uploads(Request $request){
        $uploads=Upload::with('user:name,id')->get();
        $user_count = $uploads->groupBy('user_id')->take($request['upload_limit']);
        $allInfo=array('user_count'=>$user_count,);
        return response()->json($allInfo);
    }


    public function find_uploads(Request $request){
//        $uploads=Upload::with('user:name,id')->get();
        $user_count = Upload::where('user_id',$request['user_name'])->with('user:name,id')->get();
//        return $user_count;
        $allInfo=array('user_count'=>$user_count,);
        return response()->json($allInfo);
    }

    public function delete_uploads(Request $request){

        $status=Upload::where('id',$request['id'])->delete();
        return $status;
    }


// STATUSES FUNCTIONS START

    public function statuses(){
        return view('admin.statuses');
    }


    public function get_statuses(){
        $user=User::all();
        $leads=ImportCsv::all();
        $user_count = $user->groupBy('status_id')->map->count();
        $lead_count = $leads->groupBy('status_id')->map->count();
        $statuses = Status::whereNotNull('id')->get();
        $allInfo=array('statuses'=>$statuses,'user_count'=>$user_count,'lead_count'=>$lead_count);
        return response()->json($allInfo);
    }


    public function get_status(Request $request){

        $status=Status::where('id',$request['id'])->get();
        return $status;
    }

    public function create_status(Request $request){

        $status= new Status();
        $status->status=$request['status'];
        $status->save();

        return $status;
    }

    public function update_status(Request $request){
        $status=Status::where('id',$request['id'])->update([
            'status'=>$request['status']
        ]);
        return $status;
    }



    public function delete_status(Request $request){

        $status=Status::where('id',$request['id'])->delete();
        return $status;
    }

//    STATUSES FUNCTIONS END







// ALLOWED IP FUNCTIONS START

public function allowedip(){
    return view('admin.allowedip');
}


public function get_allowedip(){
    $allowedip=AllowedIp::all();
    return response()->json($allowedip);
}


public function create_allowedip(Request $request){

    $allowedip= new AllowedIp();
    $allowedip->ip=$request['ip'];
    $allowedip->save();

    return $allowedip;
}

public function update_allowedip(Request $request){
    $allowedip=AllowedIp::where('id',$request['id'])->update([
        'ip'=>$request['ip']
    ]);
    return $allowedip;
}



public function delete_allowedip(Request $request){

    $allowedip=AllowedIp::where('id',$request['id'])->delete();
    return $allowedip;
}

//    ALLOWED IP FUNCTIONS END









// DESKS START

public function desks(){
    return view('admin.desks');
}


public function get_desks(){
    $desks=Desks::all();
    return response()->json($desks);
}


public function create_desk(Request $request){

    $desk= new Desks();
    $desk->desk=$request['desk'];
    $desk->save();

    return $desk;
}



public function delete_desk(Request $request){

    $desk=Desks::where('id',$request['id'])->delete();
    return $desk;
}

//    DESKS END









// ALLOWED IP FUNCTIONS START

public function allowedpromocode(){
    return view('admin.allowedpromocode');
}


public function get_allowedpromocode(){
    $allowedpromocode=PromoCode::all();
    return response()->json($allowedpromocode);
}


public function create_allowedpromocode(Request $request){

    $allowedpromocode= new PromoCode();
    $allowedpromocode->promocode=$request['promocode'];
    $allowedpromocode->description=$request['description'];
    $allowedpromocode->save();

    return $allowedpromocode;
}


public function delete_allowedpromocode(Request $request){

    $allowedpromocode=PromoCode::where('id', $request['id'])->delete();
    return $allowedpromocode;
    
}

//    ALLOWED IP FUNCTIONS END







    public function changeAccountType(Request $request){
        $this->validate($request,[
                'user_id'=>'required',
                'account'=>'required',
//            'full_name_bank'=>'required|string|max:255',
//            'email_transaction'=>'required',
//            'whatsapp'=>'required',
            ]
        );
        $user=User::findOrFail($request['user_id']);

        $changeGroup = $this->changeGroup($user->mt4_account, $request['account']);

//        return $changeGroup;
        if(!$changeGroup){
            return response()->json([
                'status' => 'error',
                'msg' => 'Error changing group',
            ], 400);
        }

        $group=groupToGuard($request['account']);

        $user->account_id=$group;
        $user->save();

        return response()->json('successful');

    }

    public function changeLeverage(Request $request){
        $this->validate($request,[
                'user_id'=>'required',
                'leverage'=>'required',
//            'full_name_bank'=>'required|string|max:255',
//            'email_transaction'=>'required',
//            'whatsapp'=>'required',
            ]
        );
        $user=User::findOrFail($request['user_id']);

        $changeLeverage = $this->changeMT4Leverage($user->mt4_account, $request['leverage']);

//        return $changeGroup;
        if(!$changeLeverage){
            return response()->json([
                'status' => 'error',
                'msg' => 'Error changing leverage',
            ], 400);
        }

        $user->leverage=$request['leverage'];
        $user->save();

        return response()->json('successful');

    }

    public function updateUser(Request $request)
    {
        

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'country_code' => 'nullable|string|max:255',
            'phone' => 'nullable|min:7|regex:/^([0-9\s\-\+\(\)]*)$/',

        ]);

   
        $user = User::find($request['user_id']);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->address = $request->input('address');
        $user->city = $request->input('city');
        $user->country = $request->input('country');
        $user->country_code = $request->input('country_code');
        $user->phone = $request->input('phone');
        $user->mt4_account = $request->input('mt4_account');
        $user->manager = $request->input('manager');
        $user->promo_code = $request->input('promo_code');



        if (isset($request['password'])&&$request['password']!=null){
            $user->password = Hash::make($request['password']);
            $user->real_password = $request['password'];


        }


        $user->save();

        return redirect()->back();
    }




    public function updateManager(Request $request)
    {
      



       
        $user = Agents::find($request['user_id']);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        
        $user->desk = $request->input('desk');
        $user->manager_desk = $request->input('manager_desk');
        $user->departament = $request->input('departament');
        $user->promo_code = $request->input('promo_code');
        $user->teamleader = $request->input('teamleader');


        if (isset($request['real_password'])&&$request['real_password']!=null){
            $user->password = Hash::make($request['real_password']);
            $user->real_password = $request['real_password'];

        }

        $user->save();

        return redirect()->back();
    }

    public function mt4PassAsAccount(Request $request){

//        $this->validate($request, [
//            'mt4_account' => ['required', 'string', 'max:255'],
//            'password' => ['required', 'min:6', 'max:255']
//        ]
//            ,
//            [
////                'required' => 'Il campo \':attribute\' è richiesto.',
////                'password.confirmed' => 'Password e Conferma Password sono differenti!',
////                'password.min' => 'La password deve essere minimo 6 caratteri!',
////                'regex' => 'Il formato di :attribute non e corretto!',
//            ]);
        $mt4pass=$this->changeMT4Password($request['mt4_account'], $request['password']);

        $changeMT4Pass = User::where('mt4_account', $request['mt4_account'])->update([
            'mt4_password'=>$request['password']
        ]);

        return $changeMT4Pass;

    }

    public function create_user()
    {
        //
        return view('admin.create_user');
    }

    public function store_user(Request $request)
    {
        //
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'country_code' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string'],
            'country' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        if ($request['create_mt4']) {
            $createdAccount = json_decode($this->createAccount($request['account_id'], $request['name'], $request['password']));
            if(empty($createdAccount)) {
                return back()->withInput()->withErrors(['Error creating MT4 account!']);
            }
            $request['mt4_account'] = $createdAccount->Login;
        }
        else
        {
            $request['mt4_account'] = null;
        }

        $data=$request->all();

        if (!isset($data['promo_code'])){
            $data['promo_code']=null;
        }

        if (!isset($data['promo_amount'])){
            $data['promo_amount']=null;
        }

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'account_id' => 'starter',
            'password' => Hash::make($data['password']),
            'real_password' => $data['password'],
            'country_code' => $data['country_code'],
            'phone' => $data['phone'],
            'country' => $data['country'],
            'city' => $data['city'],
            'address' => $data['address'],
            'promo_code' => $data['promo_code'],
            'over_18' => 1,
            'accept_terms' => 1,
            'mt4_account' => $data['mt4_account'],
            'mt4_password' => $data['password'],
        ]);


        $user->assignRole($data['account_id']);
        return back();
    }

    public function create_mt4(Request $request){
//        return $request->all();
        $this->validate($request, [
            'user.mt4_password' => ['required', 'min:8', 'max:255']
        ]);

//        $request['user']['password']=$request['user']['mt4_password'];

        $reqUser=$request['user'];

//        $reqUser['password']=$request['mt4_password'];

        $createdAccount = json_decode($this->createAccount($reqUser['account_id'], $reqUser['name'], $reqUser['mt4_password']));

        if(empty($createdAccount)) {
            return back()->withInput()->withErrors(['Error creating MT4 account!']);
        }

        $user=User::find($request['user']['id']);

        $user->mt4_account=$createdAccount->Login;
        $user->mt4_password=$createdAccount->Password;

        $user->save();
        return $user;
//        return $request->all();
    }




    public function delete_user(Request $request){
        $this->validate($request, [
            'user_id' => ['required', 'integer']
        ]);

        User::where('id', $request['user_id'])->delete();
    }


    public function delete_agent(Request $request){
        $this->validate($request, [
            'user_id' => ['required', 'integer']
        ]);

        Agents::where('id', $request['user_id'])->delete();
    }




    public function delete_lead(Request $request){
        $this->validate($request, [
            'user_id' => ['required', 'integer']
        ]);

        ImportCsv::where('id', $request['user_id'])->delete();
    }







    public function delete_request(Request $request){
        $this->validate($request, [
            'request_id' => ['required', 'integer']
        ]);

        Deposit_request::where('id', $request['request_id'])->delete();
    }



    public function delete_project(Request $request){
        $this->validate($request, [
            'id' => ['required', 'integer']
        ]);

        Project::where('id', $request['id'])->delete();
    }




    public function delete_withdraw(Request $request){
        $this->validate($request, [
            'id' => ['required', 'integer']
        ]);

        Withdraw::where('id', $request['id'])->delete();
    }


















    //---------------------------------------------------------------------------- TRANSACTION LOGS -------------------------------------------------------------------------------------------------



    public function transaction_logs()
    {

        return view('admin.transactions' );

    }

    public function getTransactions(Request $request)
    {

        $transaction = Transaction_logs::whereNotNull('user_id')->join('users', 'transaction_logs.user_id', '=', 'users.id')->select('transaction_logs.*', 'users.name', 'users.mt4_account', 'users.account_id')->orderBy('created_at','desc');


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









    //---------------------------------------------------------------------------- DEPOSIT REQUESTS -------------------------------------------------------------------------------------------------



    public function deposit_request()
    {

        return view('admin.deposit_request' );

    }

    public function getDepositRequests(Request $request)
    {

        $deposit_requests = Deposit_request::whereNotNull('user_id')->join('users', 'deposit_requests.user_id', '=', 'users.id')->select('deposit_requests.*', 'users.name', 'users.mt4_account', 'users.account_id')->orderBy('created_at','desc');


        if (!empty($request->get('name'))) {
            $deposit_requests = $deposit_requests->where('name','LIKE',"%{$request->name}%");
        }
      

        return Datatables::of($deposit_requests)

            ->addIndexColumn()



            ->addColumn('action', function ($deposit_requests) {

                $btn = '<a onclick="delete_deposit_request(' . $deposit_requests->id . ')"><i class="fa fa-times font-20 deleteUser"></i></a>';

                return $btn;
            })


            ->rawColumns(['action'])
            ->make();

    }



//--------------------------------------------------------------------------- DEPOSIT REQUESTS --------------------------------------------------------------------------------------------------------







    public function calendar()
    {

        return view('admin.calendar');
    }



    public function get_managers_form(Request $request)
    {

        $form_data = FormData::with('user:name,id')->get()->take($request['form_limit']);
        $allInfo=array('form_data'=>$form_data);
        return response()->json($allInfo);

    }



    public function find_manager_form(Request $request){

        $form_data = FormData::where('manager_id',$request['user_name'])->with('user:name,id')->get();
        $allInfo=array('form_data'=>$form_data);
        return response()->json($allInfo);
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
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return string
     */

    public function update_geo_ip(){

        $allUsers=User::all();
        foreach ($allUsers as $user) {
            $ip_country = null;
            $ip_city = null;
            $ip_code = null;
            $apiKey=null;
//            $ipfind = new IPFind($apiKey);

            if ($user->ip!=null){
                if (!$user->ip_country) {
                    $ipfind = new IPFind($apiKey);
                    try {
                        $geoInfo = $ipfind->fetchIPAddress($user->ip);
                    } catch (APIErrorException $e) {
                        return 'APIErrorException' . $e;
                    } catch (InvalidIPAddressException $e) {
                        return 'InvalidIPAddressException' . $e;

                    } catch (UnexpectedResponseException $e) {
                        return 'UnexpectedResponseException' . $e;
                    }


                    if (isset($geoInfo->error)) {
                        $ip_country = null;
                        $ip_city = null;
                        $ip_code = null;
                    } else {
                        $ip_country = $geoInfo->country;
                        $ip_city = $geoInfo->city;
                        $ip_code = $geoInfo->country_code;

                    }

                    if (isset($ip_country)) {
                        $user->ip_country = $ip_country;
                    }
                    if (isset($ip_city)) {
                        $user->ip_city = $ip_city;
                    }
                    if (isset($ip_code)) {
                        $user->ip_code = $ip_code;
                    }

                    $user->save();
//                    echo $user->name;
//                    echo '<br>';
//                    print_r($geoInfo);
//                    echo '<br>';
//                    echo '<br>';

                }
            }
        }
        return 'success';
    }

    public function destroy($id)
    {
        //
    }


    public function exportCsv($id)
    {
        $fileName = 'reports.csv';
        $form_all = FormData::where('id',$id)->get();
//        $form json_decode($form_all[0]->result);
        $form = json_decode($form_all[0]->result);

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

            $columns = array('Client', 'Amount', 'Date', 'Comment', 'Type');

        $callback = function() use($form, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($form as $task) {
                $row['Client']  = $task->user;
                $row['Amount']    = $task->amount;
                $row['Date']    = $task->date;
                $row['Comment']  = $task->comment;
                $row['Type']  = $task->type;

                fputcsv($file, array($row['Client'], $row['Amount'], $row['Date'], $row['Comment'], $row['Type']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }


}
