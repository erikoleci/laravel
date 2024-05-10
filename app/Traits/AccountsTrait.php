<?php

namespace App\Traits;

use App\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;

trait AccountsTrait
{

    // protected $api_url='';


     protected $api_url='88.198.11.245:9095';

    public function allAccounts(){
//        return $user;
        $client = new \GuzzleHttp\Client();
        $emptyArr=array();
        try {
            $request = $client->get($this->api_url . '/api/Users/UsersGet', [
                'headers' => [
                    'Accept' => 'application/json',
                ],
            ]);
            $response = $request->getBody()->getContents();

            return json_decode($response);

        } catch (RequestException $ex) {
            return $emptyArr;
        }
    }

    public function getAccount($accounts, $mt4){

        foreach ($accounts as $key=>$account){

            if ($account->Login==$mt4){
                return $account;
            }
        }
    }

    public function getMargin($mt4){
//        return $user;
        $client = new \GuzzleHttp\Client();
        try {
            $request = $client->get($this->api_url . '/api/Margins/MarginLevelRequest', [
                'headers' => [
                    'Accept' => 'application/json',
                ],
                'query' => [
                    'login' => $mt4,
                ]
            ]);
            $response = $request->getBody()->getContents();

            return json_decode($response);

        } catch (RequestException $ex) {

            return null;
        }
    }



    public function createAccount($account, $name, $password){
        try {
            $client = new Client();
            $request = $client->post($this->api_url.'/api/users/CreateAccount', [
                'headers' => [
                    'Content-Type'     => 'application/x-www-form-urlencoded'
                ],
                'form_params' => [
                    'Group' => guardAccount($account),
//                'Leverage' => accountLeverage($req['account_id']),
                    // 'Login'=> '30000',
                    'Name' => $name,
                    'Password' => $password,
                    'InvestorPass'=> $password,
                    // 'Enable'=> 1,
                ]
            ]);
            $response = $request->getBody()->getContents();

            return $response;
        } catch (RequestException $ex) {
            return false;
        }
    }

    

    public function changeGroup($login, $group){
        try {
            $client = new Client();
            $request = $client->post($this->api_url.'/api/Users/UserRecordUpdate', [
                'headers' => [
                    'Content-Type'     => 'application/x-www-form-urlencoded'
                ],
                'form_params' => [
//                'Leverage' => accountLeverage($req['account_id']),
                    'Group'=> $group,
                    'Login'=> $login,
                ]
            ]);
            $response = $request->getBody()->getContents();

            return true;
        } catch (RequestException $ex) {
            return $ex;
        }
    }

    public function changeMT4Leverage($login, $leverage){
        try {
            $client = new Client();
            $request = $client->post($this->api_url.'/api/Users/UserRecordUpdate', [
                'headers' => [
                    'Content-Type'     => 'application/x-www-form-urlencoded'
                ],
                'form_params' => [
//                'Leverage' => accountLeverage($req['account_id']),
                    'Leverage'=> $leverage,
                    'Login'=> $login,
                ]
            ]);
            $response = $request->getBody()->getContents();

            return true;
        } catch (RequestException $ex) {
            return $ex;
        }
    }

    public function changeMT4Password($login, $password){
//        return $login;
     
        try {
            $client = new Client();
            $request = $client->post($this->api_url.'/api/Users/Resetpwd', [
                'headers' => [
                    'Content-Type'     => 'application/x-www-form-urlencoded',
                ],
                'form_params' => [
                    'Login' => $login,
                    'Enable' => 1,
                    'Password' => $password,
                ]
            ]);
            $response = $request->getBody()->getContents();

            return 'success';

        } catch (RequestException $ex) {

            return 'fail';
        }
    }

    public function createDeposit($user_id, $amount, $description){
        $user=User::find($user_id);

        try {
            $client = new Client();
            $request = $client->post($this->api_url.'/api/Users/deposit', [
                'headers' => [
                    'Content-Type'     => 'application/x-www-form-urlencoded',
                ],
                'form_params' => [
                    'Login' => $user->mt4_account,
                    'price' => $amount,
                    'Comment' => $description,
//                  'Group' => guardAccount($user->account_id),
                ]
            ]);
            $response = $request->getBody()->getContents();
            return $response;

        } catch (RequestException $ex) {
            return false;
        }
    }

    public function createWithdraw($user_id, $amount){
        $user=User::find($user_id);

        try {
            $client = new Client();
            $request = $client->post($this->api_url.'/api/users/WithDraw', [
                'headers' => [
                    'Content-Type'     => 'application/x-www-form-urlencoded',
                ],
                'form_params' => [
                    'Login' => $user->mt4_account,
                    'price' => $amount,
                    'Comment' => 'Withdraw',
//                    'Group' => guardAccount($user->account_id),
                ]
            ]);
            $response = $request->getBody()->getContents();
            return $response;

        } catch (RequestException $ex) {
            return false;
        }
    }

    public function createCredit($login, $amount, $description){

        try {
            $client = new Client();
            $request = $client->post($this->api_url.'/api/Users/Credit', [
                'headers' => [
                    'Content-Type'     => 'application/x-www-form-urlencoded',
                ],
                'form_params' => [
                    'Login' => $login,
                    'price' => $amount,
                    'Comment' => $description,
//                    'Group' => guardAccount($user->account_id),
                ]
            ]);
            $response = $request->getBody()->getContents();
            return $response;

        } catch (RequestException $ex) {
            return false;
        }
    }


    public function removeCredit($login, $amount, $description){

        try {
            $client = new Client();
            $request = $client->post($this->api_url.'/api/Users/CreditOut', [
                'headers' => [
                    'Content-Type'     => 'application/x-www-form-urlencoded',
                ],
                'form_params' => [
                    'Login' => $login,
                    'price' => $amount,
                    'Comment' => $description,
//                    'Group' => guardAccount($user->account_id),
                ]
            ]);
            $response = $request->getBody()->getContents();
            return $response;

        } catch (RequestException $ex) {
            return false;
        }
    }

    public function changeStatusUser($login, $status){
        try {
            $client = new Client();
            $request = $client->post($this->api_url.'/api/Users/EnableUser', [
                'headers' => [
                    'Content-Type'     => 'application/x-www-form-urlencoded'
                ],
                'query' => [
                    'Login' => $login,
                    'enable' => $status,
                ]
            ]);
            $response = $request->getBody()->getContents();

            return $response;
        } catch (RequestException $ex) {
            return false;
        }
    }

}
