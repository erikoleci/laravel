<?php

namespace App\Http\Controllers;

use App\Collateral;
use App\Credit;
use App\PaymentsRepository;
use App\Traits\AccountsTrait;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CollateralController extends Controller
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
        $collaterals=Collateral::all();
        $users=User::all();

        return view('admin.collaterals')->with(['collaterals'=>$collaterals, 'users'=>$users]);
    }






    //---------------------------------------------------------------------------- COLLATERAL -------------------------------------------------------------------------------------------------



    public function collaterals()
    {

        return view('admin.collateral' );

    }

    public function getCollaterals(Request $request)
    {

        $collateral = Collateral::whereNotNull('user_id')->join('users', 'collaterals.user_id', '=', 'users.id')->select('collaterals.*', 'users.name', 'users.mt4_account', 'users.account_id')->orderBy('created_at','desc');



        if (!empty($request->get('name'))) {
            $collateral = $collateral->where('name','LIKE',"%{$request->name}%");
        }
   

        return Datatables::of($collateral)

            ->addIndexColumn()




            ->addColumn('action', function ($collateral) {

                $btn = '<a onclick="delete_collateral(' . $collateral->id . ')"><i class="fa fa-times font-20 deleteUser"></i></a>';

                return $btn;
            })


            ->addColumn('type', function ($collateral) {

                if ($collateral->type === 'positive')
                    $btn='<i style="color: green" class="fa fa-arrow-right font-18 transactionType"></i>';
                else
                    $btn='<i style="color: red" class="fa fa-arrow-left font-18 transactionType"></i>';


                return $btn;
            })

            ->rawColumns(['action','type'])
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
                $this->removeCredit($user->mt4_account, $request['amount'], $request['description']);
            }
            else{
                $this->createCredit($user->mt4_account, $request['amount'], $request['description']);
            }
//        }

        $insertCollateral=PaymentsRepository::insertCollateral($request, null, $request['type']);

        return $insertCollateral;
    }


    public function storeNew(Request $request)
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
                $this->removeCredit($user->mt4_account, $request['amount'], $request['description']);
            }
            else{
                $this->createCredit($user->mt4_account, $request['amount'], $request['description']);
            }
//        }

        $insertCollateral=PaymentsRepository::insertCollateral($request, null, $request['type']);

        return $insertCollateral;
    }

    public function paypal_test(Request $request)
    {
        //
        $this->validate($request,[
            'amount'=>'required|integer|min:0'
        ]);



        $user=logged_in();

        if (isset($user->mt4_account)) {

            $this->createCredit($user->mt4_account, $request['amount']);

        }

//        $user=User::find($request['user_id']);
//
////        if (isset($user->mt4_account)) {
//        if ($request['type']==='negative') {
//            $this->removeCredit($user->mt4_account, $request['amount']);
//        }
//        else{
//            $this->createCredit($user->mt4_account, $request['amount']);
//        }

        $insertCollateral=PaymentsRepository::insertCollateral_test($request,null, $request['amount']);

        return $insertCollateral;
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


    public function delete_credit(Request $request){
        $this->validate($request, [
            'credit_id' => ['required', 'integer']
        ]);

        Credit::where('id', $request['credit_id'])->delete();
    }

    public function delete_collateral(Request $request){
        $this->validate($request, [
            'collateral_id' => ['required', 'integer']
        ]);

        Collateral::where('id', $request['collateral_id'])->delete();
    }
}
