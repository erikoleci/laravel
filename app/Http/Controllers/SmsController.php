<?php

namespace App\Http\Controllers;

use App\SendgridEmail;
use App\Sms;
use Illuminate\Http\Request;
use Twilio\Rest\Client;

class SmsController extends Controller
{






    // public function sendSms(Request $request)
    // {

    //     $phone_number='+44'.$request["phone"];

    //     // $account_sid = '';
    //     // $auth_token = ';
    //     // $twilio_number = '';

    //     $client = new Client($account_sid, $auth_token);

    //     $client->messages->create($phone_number,
    //         ['from' => $twilio_number, 'body' => $request['message']]);


    //     $sms = new Sms();
    //     $sms->type = 'out';
    //     $sms->user_id=logged_in()->id;
    //     $sms->user_name=logged_in()->name;
    //     $sms->client_id=$request['smsid'];
    //     $sms->client_name=$request['smsname'];
    //     $sms->from_number=$twilio_number;
    //     $sms->to_number=$phone_number;
    //     $sms->message=$request['message'];
    //     $sms->save();
    //     return;
    // }


    // public function receiveSms(Request $request)
    // {

    //     $sms = new Sms();
    //     $sms->type = 'in';
    //     $sms->user_id='34';
    //     $sms->client_id='34';
    //     $sms->from_number=$request['From'];
    //     $sms->to_number=$request['To'];
    //     $sms->message=$request['Body'];
    //     $sms->save();


    //     return;
    // }


    // public function receiveEmail(Request $request)
    // {

    //     $email = new SendgridEmail();
    //     $email->from_email = $request['from'];
    //     $email->to_email=$request['to'];
    //     $email->subject=$request['subject'];
    //     $email->email_text=$request['text'];
    //     $email->attachment_info=$request['attachment-info'];
    //     $email->save();


    //     return;
    // }




    // public function sms_log(){

    //     return view('admin.sms_log');

    // }


    // public function get_sms_log($nr){
    //     if (logged_in()->account_id==='admin')
    //     $get_sms= Sms::whereNotNull('id')->orderByDesc('created_at')->take($nr)->get();
    //     elseif (logged_in()->account_id==='manager')
    //     $get_sms= Sms::where('user_id', logged_in()->id)->orderByDesc('created_at')->take($nr)->get();
    //     $all=array('sms'=>$get_sms);
    //     return response()->json($all);
    // }












}
