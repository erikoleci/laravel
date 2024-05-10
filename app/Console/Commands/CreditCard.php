<?php

namespace App\Console\Commands;

use App\CardRepository;
use App\PaymentsRepository;
use App\Transaction_logs;
use App\User;
use App\Traits\AccountsTrait;
use Illuminate\Console\Command;

class CreditCard extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:creditCard';

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
//     public function handle(){
//         $creditCard = Transaction_logs::where('status','=', 'pending')->get();
// //        dd($creditCard[0]->orderId);
//         foreach ($creditCard as $key => $creditCard )
//         {   $orderId = $creditCard->orderId;
//             $creditResponse=CardRepository::purchase_scuderia_status($orderId);

//             if ($creditResponse->status == 'approved')
//             {
//                 $creditCard->status = 'success';
//                 $creditCard->save();
//                 $deposit=CardRepository::createDepositCard($creditCard->requestId, $creditCard->source_amount);
//                 $depositCard=PaymentsRepository::insertDepositCard($creditCard->source_amount, $creditCard->user_id, $creditCard->id);
// //                $creditResponse=PaymentsRepository::insertCollateralCard($creditCard->source_amount, $creditCard->user_id);
// //                $depositTest=CardRepository::createCreditCardDeposit($creditCard->requestId, $creditCard->source_amount);



//             }

//             elseif ($creditResponse->status == 'declined'){
//                 $creditCard->status = 'declined';
//                 $creditCard->save();

//             }

//             elseif ($creditResponse->status == 'expired'){
//                 $creditCard->status = 'expired';
//                 $creditCard->save();
//             }
//       }
//     }
}
