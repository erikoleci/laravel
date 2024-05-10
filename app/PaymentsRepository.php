<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentsRepository extends Model
{
    //

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

    static function updateUserBank(Request $request, $user_id){
        User::where('id', $user_id)->update([
            'full_name_bank' => $request->input('full_name_bank'),
            'email_transaction' => $request->input('email_transaction'),
            'whatsapp' => $request->input('whatsapp'),
        ]);
    }

    static function updateAdminUserBank(Request $request, $user_id){
        User::where('id', $user_id)->update([
            'full_name_bank' => $request->input('full_name_bank'),
            'email_transaction' => $request->input('email_transaction'),
            'whatsapp' => $request->input('whatsapp'),
//            'collateral' => $request->input('collateral'),
        ]);
    }

    static function insertDepositRequest($request, $user_id){
        $deposit=new Deposit_request;
        $deposit->user_id=$user_id;
        $deposit->amount=$request['amount'];
        $deposit->currency=$request['currencyCode'];
        $deposit->full_name_bank=$request['full_name_bank'];
        $deposit->whatsapp=$request['whatsapp'];
        $deposit->email_transaction='email_transaction';
        $deposit->status='new';
        $deposit->save();

        return $deposit;
    }

    static function insertDepositBank($request, $user_id, $transaction_id){
        $deposit=new Deposit;
        $deposit->source_amount=$request['amount'];
        $deposit->source_currency=$request['currencyCode'];
        $deposit->amount=$request['amount'];
        $deposit->currency=$request['currencyCode'];
        $deposit->user_id=$user_id;
        $deposit->credit_card_id=null;
        $deposit->transaction_id=$transaction_id;
        $deposit->source='bank';
        $deposit->type=$request['type'];
        $deposit->description=$request['description'];
        $deposit->save();

        return $deposit;
    }

    static function insertDepositCard($amount, $user_id, $transaction_id){
        $deposit=new Deposit;
        $deposit->source_amount=$amount;
        $deposit->source_currency='EUR';
        $deposit->amount=$amount;
        $deposit->currency='EUR';
        $deposit->user_id=$user_id;
        $deposit->credit_card_id=null;
        $deposit->transaction_id=$transaction_id;
        $deposit->source='Card';
        $deposit->type='positive';
        $deposit->description='Card Deposit';
        $deposit->save();

        return $deposit;
    }

    static function insertCollateral($request, $transaction_id, $type){
        $collateral=new Collateral;
        $collateral->amount=$request['amount'];
        $collateral->user_id=$request['user_id'];
        $collateral->transaction_id=$transaction_id;
        $collateral->type=$type;
        $collateral->description=$request['description'];
        $collateral->save();

        return $collateral;
    }


    static function insertCollateralCard($amount, $user_id){
        $collateral=new Collateral;
        $collateral->amount=$amount;
        $collateral->user_id=$user_id;
        $collateral->type='positive';
        $collateral->description='testCard';
        $collateral->save();

        return $collateral;
    }

    static function insertCollateral_test($request, $transaction_id, $amount){
        $collateral=new Collateral;
        $collateral->amount=$request['amount'];
        $collateral->user_id=logged_in()->id;
        $collateral->transaction_id=$transaction_id;
        $collateral->type='positive';
        $collateral->description='paypal';
        $collateral->save();

        return $collateral;
    }




    static function insertPromo($request, $transaction_id, $type){
        $credit=new Credit;
        $credit->amount=$request['amount'];
        $credit->user_id=$request['user_id'];
        $credit->mt4_account=$request['mt4_account'];
        $credit->transaction_id=$transaction_id;
        $credit->type=$type;
        $credit->description=$request['description'];
        $credit->save();

        return $credit;
    }

    static function insertDeposit($creditCard, $transaction_id){
        $deposit=new Deposit;
        $deposit->amount=$creditCard->amount;
        $deposit->currency=$creditCard->currencyCode;
        $deposit->source_amount=$creditCard->source_amount;
        $deposit->source_currency=$creditCard->source_currency_code;
        $deposit->user_id=logged_in()->id;
        $deposit->credit_card_id=$creditCard->ccNumber;
        $deposit->transaction_id=$transaction_id;
        $deposit->source='credit_card';
        $deposit->save();

        return $deposit;
    }



    static function insert_card_log($purchase, $clientData) {
        $transaction=new Transaction_logs;
        $transaction->user_id=logged_in()->id;
        $transaction->created_by=logged_in()->id;
        $transaction->requestId=logged_in()->mt4_account;
        $transaction->orderId=$purchase->data->transactionId;
        $transaction->status='pending';
        $transaction->source_amount=$clientData;
        $transaction->source_currency_code='EUR';
        $transaction->save();
    }

    static function insert_transaction_log($data){
//        return $data;
        $transaction=new Transaction_logs;
        $transaction->user_id=logged_in()->id;
        $transaction->created_by=logged_in()->id;
        $transaction->requestId=$data->requestId;
        $transaction->orderId=$data->orderId;
        if (isset($data->sourceAmount)) {
            $transaction->source_amount = $data->sourceAmount->amount;
        }
        if (isset($data->sourceAmount)) {
            $transaction->source_currency_code = $data->sourceAmount->currencyCode;
        }
        if (isset($data->amount)) {
            $transaction->amount = $data->amount->amount;
        }
        if (isset($data->amount)) {
            $transaction->currencyCode = $data->amount->currencyCode;
        }
        $transaction->ccNumber=$data->ccNumber;
        $transaction->cardId=$data->cardId;
        $transaction->responseTime=$data->responseTime;
        if (isset($data->result)&&isset($data->result->resultCode)) {
            $transaction->resultCode = $data->result->resultCode;
            if ($transaction->resultCode==1) {
                $transaction->status='completed';
            }
            else{
                $transaction->status='failed';
            }
        }
        if (isset($data->result)&&isset($data->result->resultMessage)) {
            $transaction->resultMessage = $data->result->resultMessage;
        }
        if (isset($data->result)&&isset($data->result->error[0])) {
            $transaction->errorCode = $data->result->error[0]->errorCode;
        }
        if (isset($data->result)&&isset($data->result->error[0])) {
            $transaction->errorMessage = $data->result->error[0]->errorMessage;
        }
        if (isset($data->result)&&isset($data->result->error[0])) {
            $transaction->advice = $data->result->error[0]->advice;
        }
        if (isset($data->result)&&isset($data->result->reasonCode)) {
            $transaction->reasonCode = $data->result->reasonCode;
        }
        $transaction->signature=$data->signature;
        $transaction->save();

        return $transaction;
    }

    static function insert_bank_transaction_log($user_id, $request, $currencyCode){
        $transaction=new Transaction_logs;
        $transaction->user_id=$user_id;
        $transaction->source_amount = $request['amount'];
        $transaction->source_currency_code = $currencyCode;
        $transaction->amount = $request['amount'];
        $transaction->currencyCode = $currencyCode;
        $transaction->status='completed';
        $transaction->created_by=logged_in()->id;
        $transaction->responseTime=now();
        $transaction->resultCode = 1;
        $transaction->type = 'bank';
        $transaction->deposit_type = $request['type'];
        $transaction->resultMessage = 'Bank transaction';
        $transaction->save();

        return $transaction;
    }

    static function insertWithdraw(Request $request){
        $deposit=new Withdraw;
        $deposit->user_id=logged_in()->id;
        $deposit->status='In Review';
        $deposit->amount=$request['amount'];
        $deposit->beneficary_name=$request['beneficary_name'];
        $deposit->bank_name=$request['bank_name'];
        $deposit->iban=$request['iban'];
        $deposit->swift=$request['swift'];
        $deposit->bank_address=$request['bank_address'];
        $deposit->save();

        return $deposit;
    }
}
