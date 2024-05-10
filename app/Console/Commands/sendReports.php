<?php

namespace App\Console\Commands;

use App\Email_alert;
use App\Margin;
use App\User;
use Illuminate\Console\Command;


class sendReports extends Command
{


    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Execute the console command.
     *
     * @return mixed
     */
//     public function handle()
//     {

// //        Catch all users which are approved for control

//         $user =User::where('margin_call', '=', '1')->get();

//         foreach ($user as $user) {

// //          Get margin for every user

//                 $margin = Margin::where('LOGIN', $user->mt4_account)->get();

// //                dd($margin[0]->MARGIN_FREE);


// //            Control if margin is less than 60%


//                 if (isset($margin[0])) {

//                 if (($margin[0]->MARGIN_LEVEL > 0) && ($margin[0]->MARGIN_LEVEL < 60)) {

// //                    Send a new notification to user

//                     $email_alert = new Email_alert;
//                     $email_alert->sender_id = 34;
//                     $email_alert->receiver_id = $user->id;
//                     $email_alert->type = 'Margin Call';
//                     $email_alert->subject = 'Margin Call';
//                     $email_alert->content = 'Please be advised that the equity of your account with  is now below 60% of the margin requirement to hold your current open positions. Please be aware that if this level falls below 50% your positions will start to be liquidated in order to maintain the required level. As per our Client Agreement, you are responsible for managing and maintaining the margin levels in your account at all times, as we are not required to inform you that you have fallen below your margin level requirement.';
//                     $email_alert->account_number = $user->mt4_account;

//                     $email_alert->save();


// //                    Set margin_call to 0 so the next cron job this user will not be controled until is approved again by admin

//                     $user->margin_call = 0;
//                     $user->save();


//                 }
//                 }
//             }

//     }





}
