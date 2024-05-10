<?php

namespace App\Http\Controllers;

use App\Deposit;
use App\Mail\TransactionEmail;
use App\Traits\AccountsTrait;
use App\User;
use App\Agents;
use App\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    use AccountsTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//

        if (logged_in()) {

//            if (Auth::guard('admin'))
//            {
//                return redirect()->action('AdminController@index');
//            }
            return redirect(get_guard().'/');

//            return view('home');
        }
        else {
            return view('auth.login_starter');
        }
    }

    public function index_guard(){
        if (logged_in()) {

//            if (Auth::guard('admin'))
//            {
//                return redirect()->action('AdminController@index');
//            }
//            return redirect(get_guard().'/');
            $credit=number_format(((logged_in()->collaterals->where('type','positive')->sum('amount'))-(logged_in()->collaterals->where('type','negative')->sum('amount'))), 2, '.', '');
            $balance=(logged_in()->deposits->where('type','positive')->sum('source_amount'))-(logged_in()->deposits->where('type','negative')->sum('source_amount'));
            $account=null;
       

         

            

            return view('home')->with(['account'=>$account,'balance'=>$balance]);

            
        }
        else {
            return view('user.select');
        }
    }



    public function deposits_chart(Request $request){


        $dep_daily = Deposit::whereMonth('created_at', '=', $request['month'])

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
        return $totalDep;
    }



    public function personal_info()
    {
        $account=$this->getAccount($this->allAccounts(), logged_in()->mt4_account);
        $margin=$this->getMargin(logged_in()->mt4_account);
        return view('user.personal_info')->with(['margin'=>$margin, 'account'=>$account]);
        // return view('user.personal_info');
    }



    public function deposit()
    {
        return view('user.deposit');
    }



    public function withdraw()
    {

            $withdraws = Withdraw::where('user_id', logged_in()->id)->get();
            return view('user.withdraw')->with(['withdraws'=>$withdraws]);

    }



    public function edituser_permission(Request $request){
        $this->validate($request,[
            'user_id'=>'required',
            'value'=>'required']);

        $user_id=$request->input('user_id');

        $changePermission = User::where('id',$user_id)->update([
            $request['type']=>$request->input('value')
        ]);

        return $changePermission;
    }






    public function edit_permission(Request $request){

      
        $exclient = Agents::where('id',$request['user_id'])->update([
            $request['type']=>$request['value']
        ]);

        return $exclient;
    }


    public function manager_leverage(Request $request){
        $this->validate($request,[
            'user_id'=>'required',
            'value'=>'required']);

        $exclient = User::where('id',$request['user_id'])->update([
            'manager_leverage'=>$request['value']
        ]);

        return $exclient;
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

        // $mt4Status=$this->changeStatusUser($user->mt4_account, $accountStatus);

        // if(!$mt4Status){
        //     return response()->json([
        //         'status' => 'error',
        //         'msg' => 'Error changing status',
        //     ], 400);
        // }

        $changeStatus = User::where('id',$request['user_id'])->update([
            'active'=>$request['value']
        ]);

        return $changeStatus;
    }

    

    public function porta_amico()
    {
        return view('user.porta_amico');
    }
  
    public function spin()
    {
        return view('user.spin');
    }
    public function calendar()
    {
        return view('user.calendar');
    }
}
