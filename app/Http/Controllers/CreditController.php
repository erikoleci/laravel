<?php

namespace App\Http\Controllers;

use App\Collateral;
use App\Credit;
use App\PaymentsRepository;
use App\Traits\AccountsTrait;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use AccountsTrait;

    public function index()
    {
        //
        $credits=Credit::all();
        $users=User::all();

        return view('admin.credits')->with(['credits'=>$credits, 'users'=>$users]);
    }







    //---------------------------------------------------------------------------- COLLATERAL -------------------------------------------------------------------------------------------------



    public function credit()
    {

        return view('admin.credit' );

    }

    public function getCredits(Request $request)
    {

        $credits = Credit::whereNotNull('user_id')->join('users', 'credits.user_id', '=', 'users.id')->select('credits.*', 'users.name', 'users.mt4_account as mt_accountt', 'users.account_id')->orderBy('created_at','desc');


        if (!empty($request->get('account'))) {
            $credits = $credits->where('account_id','LIKE',"%{$request->account}%");
        }
        if (!empty($request->get('name'))) {
            $credits = $credits->where('name','LIKE',"%{$request->name}%");
        }
        if (!empty($request->get('name')) AND !empty($request->get('account'))) {
            $credits = $credits->where('name','LIKE',"%{$request->name}%")->where('account_id','LIKE',"%{$request->account}%");
        }

        return Datatables::of($credits)

            ->addIndexColumn()


            ->addColumn('account', function ($credits) {

                if ($credits->account_id === 'black_panther') {
                    $btn5 = '<img class="rounded-circle" src="' . asset('images/users/panther_logo.png') . '" alt="user" width="65">';
                } elseif ($credits->account_id === 'bull_bear') {
                    $btn5 = '<img class="rounded-circle" src="' . asset('images/users/bull_logo.png') . '" alt="user" width="65">';
                } elseif ($credits->account_id === 'phoenix') {
                    $btn5 = '<img class="rounded-circle" src="' . asset('images/users/phoenix_logo.png') . '" alt="user" width="65">';
                } elseif ($credits->account_id === 'kings') {
                    $btn5 = '<img class="rounded-circle" src="' . asset('images/users/kings_logo.png') . '" alt="user" width="65">';
                } elseif ($credits->account_id === 'promo') {
                    $btn5 = '<img class="rounded-circle" src="' . asset('images/users/promo_logo.png') . '" alt="user" width="65">';
                } else $btn5 = '<img class="rounded-circle" src="' . asset('images/users/admin_logo.png') . '" alt="user" width="65">';

                return $btn5;
            })



            ->addColumn('action', function ($credits) {

                $btn = '<a onclick="delete_credits(' . $credits->id . ')"><i class="fa fa-times font-20 deleteUser"></i></a>';

                return $btn;
            })


            ->addColumn('type', function ($credits) {

                if ($credits->type === 'positive')
                    $btn='<i style="color: green" class="fa fa-arrow-right font-18 transactionType"></i>';
                else
                    $btn='<i style="color: red" class="fa fa-arrow-left font-18 transactionType"></i>';


                return $btn;
            })

            ->rawColumns(['account','action','type'])
            ->make();

    }



//--------------------------------------------------------------------------- COLLATERAL --------------------------------------------------------------------------------------------------------






























    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $this->validate($request,[
                'user_id'=>'required',
                'amount'=>'required|integer|min:0',
                'type'=>'string',
                'description'=>'string',
            ]);

        $user=User::find($request['user_id']);

//        if (isset($user->mt4_account)) {
            if ($request['type']==='negative') {
                $this->removeCredit($user->mt4_account, $request['amount']);
            }
            else{
                $this->createCredit($user->mt4_account, $request['amount'], $request['description']);
            }
//        }

        $insertPromo=PaymentsRepository::insertPromo($request, null, $request['type']);

        return $insertPromo;
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
