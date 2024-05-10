<?php

namespace App;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardRepository extends Model
{
    //
    static function createCreditCard(Request $request, $card_number, $expiration_date){
        $creditCard=new Credit_card();
        $creditCard->user_id=logged_in()->id;
        $creditCard->card_number=$card_number;
        $creditCard->card_holder=$request->input('card_holder');
        $creditCard->expiration_date=$expiration_date;
        $creditCard->cvv=$request->input('cvv');
        $creditCard->save();

        return $creditCard;
    }

    static function purchase_scuderia_status($id){

        $client = new \GuzzleHttp\Client();
        try {
            $request = $client->get(''.$id, [
                'headers' => [
                    'Content-Type'     => 'application/x-www-form-urlencoded',
                    'Authorization' => '',
                ],

            ]);
            $response = $request->getBody()->getContents();
            $purchase = json_decode($response);
            return $purchase;

        } catch (RequestException $ex) {

            return null;
        }
    }


    static function createCreditCardDeposit($login, $amount){
  
        try {
            $client = new \GuzzleHttp\Client();
            $request = $client->post('', [
                'headers' => [
                    'Content-Type'     => 'application/x-www-form-urlencoded',
                ],
                'form_params' => [
                    'Login' => $login,
                    'price' => $amount,
                    'Comment' => 'test',
//                    'Group' => guardAccount($user->account_id),
                ]
            ]);
            $response = $request->getBody()->getContents();
            return $response;

        } catch (RequestException $ex) {
            return false;
        }
    }


    static function createDepositCard($login, $amount){
      
        try {
            $client = new \GuzzleHttp\Client();
            $request = $client->post('', [
                'headers' => [
                    'Content-Type'     => 'application/x-www-form-urlencoded',
                ],
                'form_params' => [
                    'Login' => $login,
                    'price' => $amount,
                    'Comment' => 'Card Deposit',
//                    'Group' => guardAccount($user->account_id),
                ]
            ]);
            $response = $request->getBody()->getContents();
            return $response;

        } catch (RequestException $ex) {
            return false;
        }
    }



    static function insertTransfer(Request $request){
        $deposit=new Internal_transfer;
        $deposit->user_id=logged_in()->id;
        $deposit->amount=$request['amount'];
        $deposit->currency=$request['currency'];
        $deposit->type=$request['type'];
        $deposit->reason=$request['reason'];
        $deposit->address=$request['address'];
        $deposit->email=$request['email'];
        $deposit->debited_name=$request['debited_name'];
        $deposit->credited_name=$request['credited_name'];
        $deposit->debited_account_type=$request['debited_account_type'];
        $deposit->debited_account_id=$request['debited_account_id'];
        $deposit->credited_account_type=$request['credited_account_type'];
        $deposit->credited_account_id=$request['credited_account_id'];
        $deposit->phone=$request['phone'];
        $deposit->save();

        return $deposit;
    }
}
