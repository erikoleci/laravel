<?php

namespace App\Http\Controllers;

require(app_path('init.php'));

use App\CardRepository;
use App\Mail\TransactionEmail;
use App\Traits\AccountsTrait;
use com\eno\api\APIClient;
use com\eno\api\util\Environment;
use com\eno\api\pojo\FETransactionInfo;
use com\eno\api\pojo\PaymentTxRequest;
use com\eno\api\util\RecurrentType;
use com\eno\api\pojo\FEOrderData;
use com\eno\api\pojo\CC;
use com\eno\api\pojo\TxAddress;
use com\eno\api\util\ResultCode;
use com\eno\api\exception\APIException;
use com\eno\api\exception\InvalidRequestException;
use com\eno\api\pojo\TxOrder;
use com\eno\api\pojo\TxOrderItem;

use App\PaymentsRepository;
use Faker\Provider\ar_SA\Payment;
use GuzzleHttp;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class PaymentsController extends Controller
{
    //
    use AccountsTrait;

    private $key;
    private $username;
    private $password;
    private $mId;
    private $maId;

    public function __construct()
    {
        //blockio init
        // $this->key = '';
        // $this->username = '';
        // $this->password = '';
        // $this->mId = '';
        // $this->maId = '';
    }


    
    public function autologin()
    {

        
        $data = array(
            'login' => logged_in()->mt4_account,
            'password' => logged_in()->real_password
         );
        $client = new \GuzzleHttp\Client();
            try {
    
                $request = $client->post('https://wta1.titan-t.com/auth/token/tmp' , [
                    'body' => json_encode($data),
                    'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json', 'Access-Control-Allow-Origin' => '*', 'Access-Control-Allow-Headers' => '*'],
                    'allow_redirects' => [
                        'max'             => 10,        // allow at most 10 redirects.
                        'strict'          => true,      // use "strict" RFC compliant redirects.
                        'referer'         => true,      // add a Referer header
                        'protocols'       => ['https'], // only allow https URLs
                        'track_redirects' => true
                    ]
                    
                ]);
                $response = $request->getBody()->getContents();
                $tmp=json_decode($response);
                return $tmp;
                // redirect()->away('https://webtrader.fgm-group.com/login?tmpToken='.$tmp);
    
            } catch (RequestException $ex) {
                return false;
            }
        
    }



    public function manager_autologin(Request $request)
    {

        
        $data = array(
            'login' => $request['mt4'],
            'password' => $request['passw']
         );
        $client = new \GuzzleHttp\Client();
            try {
    
                $request = $client->post('https://wta1.titan-t.com/auth/token/tmp' , [
                    'body' => json_encode($data),
                    'headers' => ['Content-Type' => 'application/json', 'Accept' => 'application/json', 'Access-Control-Allow-Origin' => '*', 'Access-Control-Allow-Headers' => '*'],
                    'allow_redirects' => [
                        'max'             => 10,        // allow at most 10 redirects.
                        'strict'          => true,      // use "strict" RFC compliant redirects.
                        'referer'         => true,      // add a Referer header
                        'protocols'       => ['https'], // only allow https URLs
                        'track_redirects' => true
                    ]
                    
                ]);
                $response = $request->getBody()->getContents();
                $tmp=json_decode($response);
                return $tmp;
                // redirect()->away('https://webtrader.fgm-group.com/login?tmpToken='.$tmp);
    
            } catch (RequestException $ex) {
                return false;
            }
        
    }


    public function purchase_scuderia(Request $clientData){
//        return $clientData;
        $client = new \GuzzleHttp\Client();

        // https://scuderia.co/checkout/pay/

        try {
            $request = $client->post('', [
                'headers' => [
                    'Content-Type'     => 'application/x-www-form-urlencoded',
                    'Authorization' => 'a1d7fc56-e610-11ea-9fc0-0242ac120005',
                ],
                'form_params' => [
                    'origin' => $clientData->id,
                    'name' => $clientData->name,
                    'lastName' => $clientData->lastName,
                    'email' => $clientData->email,
                    'country' => $clientData->country,
                    'amount' => $clientData->amount,
                    'address' => $clientData->address,
                    'zipCode' => $clientData->zipCode,
                    'city' => $clientData->city,
                    'returnURL' => '',
                    // https://
                ]
            ]);
//                    return $clientData;
            $response = $request->getBody()->getContents();
            $purchase = json_decode($response);
            $creditCard=PaymentsRepository::insert_card_log($purchase,$clientData->amount);
            return redirect($purchase->data->url);


        } catch (RequestException $ex) {

            return null;
        }
    }





//     public function returnSuccess(){

//         $urlResponse = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// //        echo "Return URL Received:".$urlResponse;//plain json which is received

//         $apiClient = new APIClient(,
//             Environment::LIVE, true);
//         $formatedResponse = $apiClient->getValidateService()->validateURLResponseSignature($urlResponse);
// //        echo "Formatted URL Resposne.Signature[$formatedResponse->isValidSignature]";

//         $transactionData=$formatedResponse->data;

//         $insertTransactionLog = PaymentsRepository::insert_transaction_log($transactionData);

//         $link=url('/transactions_logs');

//         Mail::to('')->send(new TransactionEmail($insertTransactionLog, $link));
//         if ($insertTransactionLog->resultCode==1) {
//             $insertMt4Deposit = $this->createDeposit(logged_in()->id, $insertTransactionLog->source_amount,'Card Deposit');

//             $insertDeposit=PaymentsRepository::insertDeposit($insertTransactionLog, $insertTransactionLog->id);

//             $notification = array(
//                 'message' => 'Successful payment',
//                 'alert-type' => 'success'
//             );

//             return redirect()->action('HomeController@index')->with($notification);
//         }
//         else{

//             $notification = array(
//                 'message' => $insertTransactionLog->errorMessage,
//                 'alert-type' => 'error'
//             );

//             return redirect()->action('HomeController@deposit')->with($notification);

//         }

// //        return $insertTransactionLog;

// //        return $formatedResponse->data;
//     }

    public function saveBank(Request $request){
   
//        $updateUserBank=PaymentsRepository::updateUserBank($request, Auth::user()->id);
        $insertBankPayment=PaymentsRepository::insertDepositRequest($request, logged_in()->id);

        $notification = array(
            'message' => 'Request confirmed. We will contact you shortly!',
            'alert-type' => 'success'
        );


        return redirect()->action('HomeController@index')->with($notification);

    }


}
