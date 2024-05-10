<?php

namespace App\Http\Controllers;

use App\CardRepository;
use App\Credit_card;
use App\Deposit;
use App\PaymentsRepository;
use App\Survey;
use App\Transaction_logs;
use App\User;
use App\Closure;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users=User::all();
        $deposits=Deposit::whereNotNull('id')->orderByDesc('created_at')->get();
        return view('admin.deposits')->with(['users'=>$users,'deposits'=>$deposits]);
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


    public function storeWithdraw(Request $request){
//        return $request->all();
        $this->validate($request,[
            'amount'=>'required|integer|min:0',
            "beneficary_name"=> 'nullable|string',
            "bank_name" => 'string|nullable',
            "iban" => 'nullable|string',
            "swift" => 'nullable|string',
            "bank_address" => 'nullable|string',
        ]);

//        $deposit=Deposit::where('id', $request['deposit_id']);
        $withdraw=PaymentsRepository::insertWithdraw($request);

        $notification = array(
            'message' => 'Withdraw submitted successfully',
            'alert-type' => 'success'
        );

        return redirect()->action('HomeController@index')->with($notification);

    }


    public function storeSurvey(Request $request){

        $this->validate($request,[
            'question_2'=> 'nullable|string',
            'question_3'=> 'nullable|string',
            'question_4'=> 'nullable|string',
            'question_5'=> 'nullable|string',
            'question_6'=> 'nullable|string',
            'question_7'=> 'nullable|string',
            'question_8'=> 'nullable|string',
            'question_9'=> 'nullable|string',
            'question_10'=> 'nullable|string',
            'question_11'=> 'nullable|string',
            'question_12'=> 'nullable|string',
            'question_13'=> 'nullable|string',
            'question_14'=> 'nullable|string',
            'question_15'=> 'nullable|string',
            'question_16'=> 'nullable|string',

        ]);



        $survey=new Survey;
        $survey->user_id=logged_in()->id;
        $survey->question_2=$request['question_2'];
        $survey->question_3=$request['question_3'];
        $survey->question_4=$request['question_4'];
        $survey->question_5=$request['question_5'];
        $survey->question_6=$request['question_6'];
        $survey->question_7=$request['question_7'];
        $survey->question_8=$request['question_8'];
        $survey->question_9=$request['question_9'];
        $survey->question_10=$request['question_10'];
        $survey->question_11=$request['question_11'];
        $survey->question_12=$request['question_12'];
        $survey->question_13=$request['question_13'];
        $survey->question_14=$request['question_14'];
        $survey->question_15=$request['question_15'];
        $survey->question_16=$request['question_16'];
        $survey->save();

        $survey_completed = User::where('id',logged_in()->id)->update([
            'survey'=>1]);


        $notification = array(
            'message' => 'Withdraw submitted successfully',
            'alert-type' => 'success'
        );


        return redirect()->action('HomeController@index')->with($notification);

    }


    public function storeTransfer(Request $request){
//        return $request->all();
        $this->validate($request,[
            'amount'=>'required|integer|min:0',
            "reason"=> 'required',
//            "name"=> 'nullable|string',
//            "account_id" => 'required',
//            "phone" => 'nullable|integer',
//            "bank_name" => 'string|nullable',
//            "code" => 'nullable|string',
//            "iban" => 'nullable|string',
//            "bank_account"=> 'nullable|string',
//            "bank_account_title" => 'nullable|string',
//            "bank_address" => 'nullable|string',
//            "intermediary_bank" => 'nullable|string',
//            "intermediary_bank_address" => 'nullable|string',
//            "intermediary_bank_aba" => 'nullable|string'
        ]);

//        $deposit=Deposit::where('id', $request['deposit_id']);
        $transfer=CardRepository::insertTransfer($request);

        return redirect()->back();
    }

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
