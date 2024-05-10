<?php

namespace App\Http\Controllers;

use App\Account;
// use App\Traits\AccountsTrait;
use App\User;
use Illuminate\Http\Request;
use Tenfef\IPFind\APIErrorException;
use Tenfef\IPFind\InvalidIPAddressException;
use Tenfef\IPFind\IPFind;
use Tenfef\IPFind\UnexpectedResponseException;

class  AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     */

    // use AccountsTrait;

    public function __construct()
    {
        $this->middleware('auth:admin',['only' => ['getAccounts','set_promo']]);
    }

    public function index()
    {
        //
        $accounts=Account::where('slug','!=', 'admin')->get();


        $apiKey = null; // get an API key from https://ipfind.co or pass in NULL if you plan on using < 100/day
        $ipAdd = \Request::ip();
        $result=null;
        $ipfind = new IPFind($apiKey);
        try {
            $geoInfo = $ipfind->fetchIPAddress($ipAdd);
        } catch (APIErrorException $e) {
            return 'APIErrorException'.$e;
        } catch (InvalidIPAddressException $e) {
            return 'InvalidIPAddressException'.$e;

        } catch (UnexpectedResponseException $e) {
            return 'UnexpectedResponseException'.$e;
        }
        if (isset($geoInfo->error)){
//            return $geoInfo->error;
        }

        var_dump($geoInfo);

        return view('admin.accounts')->with(['accounts'=>$accounts]);
    }

    // public function getAccounts($id){
    //     $user=User::findOrFail($id);
    //     $user->account;
    //     $account=$this->getAccount($this->allAccounts(), $user->mt4_account);

    //     $accounts=Account::all();
    //     $allInfo=array('user'=>$user, 'accounts'=>$accounts, 'account'=>$account );
    //     return response()->json($allInfo);
    // }



    public function getAccounts($id){
        $user=User::findOrFail($id);
        $user->account;
        $account=$user->account_id;

        // $accounts=Account::all();
        // $allInfo=array('user'=>$user, 'accounts'=>$accounts, 'account'=>$account );
        return response()->json($account);
    }


    
    public function getTL($id){
        $user=User::where('id',$id)->select('id','name')->first();
        return response()->json($user);
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

    public function set_promo(Request $request)
    {
        //
        $account=Account::find($request['account_id']);
        $account->promo_code=$request['promo_code'];
        $account->save();

        return $account;
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
