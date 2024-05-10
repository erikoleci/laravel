<?php

namespace App\Http\Controllers;


use App\Deposit_request;
use App\Email_alert;
use App\Email_template;
use App\Mail\DepositEmail;
use App\Mail\MarginEmail;
use App\Mail\UserMail;
use App\SendgridEmail;
use App\Traits\AccountsTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailAlertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // use AccountsTrait;

    public function index()
    {
        //
        return view('user.email_alert');
    }

    public function adminEmails()
    {



        return view('admin.sent_email_alerts');
    }

    public function getAlertsUser(){

        $email_bank=Email_alert::where('receiver_id', logged_in()->id)->with('receiver')->orderByDesc('id')->get();
        $user=logged_in();

        $allInfo=array('user'=>$user, 'emails1'=>$email_bank);
        return response()->json($allInfo);
    }

    public function getAlertsAdmin(){

        $email_alerts=Email_alert::where('type', '=', 'Margin Call')->with('receiver')->orderByDesc('id')->get();
        $email_bank=Email_alert::where('type', '=', 'request')->with('receiver')->orderByDesc('id')->get();
        $email_promo=Email_alert::where('type', '=', 'spin')->with('receiver')->orderByDesc('id')->get();
        $users=User::all();
        $templates=Email_template::whereNotNull('id')->orderByDesc('created_at')->get();

        $allInfo=array('users'=>$users, 'emails'=>$email_alerts, 'emails1'=>$email_bank, 'emails2'=>$email_promo, 'templates'=>$templates);
        return response()->json($allInfo);
    }

    public function emailsView () {

        return view('admin.emails');

    }

    // public function getEmailsAdmin(){

    //     $SentEmails=SendgridEmail::where('type','out')->orderByDesc('id')->get();
    //     $ReceivedEmails=SendgridEmail::where('type','in')->orderByDesc('id')->get();

    //     $emails=array('SentEmails'=>$SentEmails, 'ReceivedEmails'=>$ReceivedEmails);
    //     return response()->json($emails);
    // }


    public function getUserTemplates(){
        $templates=Email_template::where('user_id',logged_in()->id)->orderByDesc('created_at')->get();
        $allInfo=array('templates'=>$templates);
        return response()->json($allInfo);
    }


    public function getUserMT4($mt4){
        $mt4account=$this->getAccount($this->allAccounts(), $mt4);
        $mt4margin=$this->getMargin($mt4);

        $data=array('mt4account'=>$mt4account, 'mt4margin'=>$mt4margin);
        return $data;
    }

    public function setRead(Request $request){
        $email = Email_alert::where('id', $request['id'])->update([
            'read'=>1
        ]);
        return $email;
    }

    public function template_store(Request $request)
    {
        //
        $template=new Email_template();
        $template->user_id=logged_in()->id;
        $template->content=$request['content'];
        $template->template_name=$request['template_name'];
        $template->type=$request['type'];
        $template->save();
        return $template;
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
     * @return Email_alert
     */
    public function store(Request $request)
    {
        //

//        return $request->all();

        if ($request['type']==='bank') {
            $this->validate($request, [
                'receiver' => 'required',
                'content' => 'required',

                'beneficiary_name' => 'required',
                'beneficiary_address' => 'required',
                'bank_name' => 'required',
                'swift' => 'required',
                'iban' => 'required',
                'full_name' => 'required',
                'amount' => 'required',
//            'password'=>'required|confirmed|min:6',

            ]);
        }
        else{
            $this->validate($request, [
                'content' => 'required',

            ]);
        }

        $user=User::find($request['receiver']);

        if ($request['type']==='bank'){
            $bank=new Email_alert;
            $bank->sender_id=logged_in()->id;
            $bank->receiver_id=$request['receiver'];
            $bank->type=$request['type'];
            $bank->content=$request['content'];
            $bank->beneficiary_name=$request['beneficiary_name'];
            $bank->beneficiary_address=$request['beneficiary_address'];
            $bank->bank_name=$request['bank_name'];
            $bank->swift=$request['swift'];
            $bank->iban=$request['iban'];
            $bank->full_name=$request['full_name'];
            $bank->amount=$request['amount'];
            $bank->save();

            // if ($request->has('send_email')&&$request['send_email']===1) {
            //     //
            //     Mail::to($user->email)->send(new DepositEmail($bank));
            // }
        }


        else if ($request['type']==='request'){
            $bank=new Email_alert;
            $bank->sender_id=34;
            $bank->receiver_id=$request['receiver'];
            $bank->type=$request['type'];
            $bank->content=$request['content'];
            $bank->beneficiary_name=$request['beneficary_name'];
            $bank->beneficiary_address=$request['beneficary_address'];
            $bank->bank_name=$request['bank_name'];
            $bank->bank_address=$request['bank_address'];
            $bank->swift=$request['swift'];
            $bank->iban=$request['iban'];
            $bank->country=$request['country'];
            $bank->location=$request['location'];
            $bank->amount=$request['amount'];
            $bank->save();

            // $deposit=new Deposit_request;
            // $deposit->user_id=logged_in()->id;
            // $deposit->amount=$request['amount'];
            // $deposit->bank_name=$request['bank_name'];
            // $deposit->beneficiary_name=$request['beneficiary_name'];
            // $deposit->beneficiary_address=$request['beneficiary_address'];
            // $deposit->bank_address=$request['bank_address'];
            // $deposit->swift=$request['swift'];
            // $deposit->iban=$request['iban'];
            // $deposit->status='New';
            // $deposit->save();

            // if ($request->has('send_email')&&$request['send_email']===1) {
            //     //
            //     Mail::to($user->email)->send(new DepositEmail($bank));
            // }
        }


        else{
            $bank=new Email_alert;
            $bank->sender_id=logged_in()->id;
            $bank->receiver_id=$request['receiver'];
            $bank->type=$request['type'];
            $bank->subject=$request['subject'];
            $bank->content=$request['content'];
            $bank->account_number=$request['account_number'];
            $bank->balance=$request['balance'];
            $bank->credit=$request['credit'];
            $bank->equity=$request['equity'];
            $bank->margin=$request['margin'];
            $bank->free_margin=$request['free_margin'];
            $bank->save();

            // if ($request->has('send_email')&&$request['send_email']===1) {
            //     //
            //     Mail::to($user->email)->send(new MarginEmail($bank));
            // }
        }



        return $bank;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Email_alert
     */

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
    public function update_template(Request $request)
    {
        return $request->all();
        //
        $updateTemplate = Email_template::where('id',$request['template_id'])->update([
            'content'=>$request['content'],
        ]);
        return $updateTemplate;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return string
     */
    public function template_destroy(Request $request)
    {
        //
        Email_template::destroy($request['template_id']);

        return 'deleted';
    }



    public function spin_inbox (Request $request)
    {

        $spin=new Email_alert;
        $spin->sender_id=34;
        $spin->receiver_id=logged_in()->id;
        $spin->type='spin';
        $spin->content='Congratulations! You have won a price using Spin & Win Feature...';
        $spin->beneficiary_name='spin';
        $spin->beneficiary_address='spin';
        $spin->bank_name='spin';
        $spin->bank_address='spin';
        $spin->swift='spin';
        $spin->iban='spin';
        $spin->full_name='spin';
        $spin->amount=$request['amount'];
        $spin->save();


    }





}
