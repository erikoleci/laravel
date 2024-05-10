<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BankDetails;
use App\Mail\CardEmail;
use Illuminate\Support\Facades\Mail;


class BankDetailsController extends Controller
{
   public function GetBankDetails(Request $request){

    $bank_details = BankDetails::where('min_amount', '<=', $request['amount'])->where('max_amount', '>=', $request['amount'])->first();
    
    return $bank_details;

   }



   public function GetFCardDetails(Request $request){

      $type='first';
      $email=logged_in()->email;


      // Mail::to($email)->send(new CardEmail($type));

      return redirect()->back()->with('status', 'Please check your email!');     
     }


     public function GetJCardDetails(Request $request){

      $type='jbt';
      $email=logged_in()->email;


      // Mail::to($email)->send(new CardEmail($type));


      return redirect()->back()->with('status', 'Please check your email!');

      // return Redirect::back()->withErrors(['msg', 'The Message']);
    
      // return redirect()->back()->with('success', 'Please check your email');   

     
     }


     
   public function GetSCardDetails(Request $request){

      $type='second';
      $email=logged_in()->email;

      // Mail::to($email)->send(new CardEmail($type));

      return redirect()->back()->with('status', 'Please check your email!');
     

     }


}
