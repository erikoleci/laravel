<?php

namespace App\Console\Commands;

use App\Transaction_logs;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckDeposit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:checkDeposit';

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
    public function handle()
    {
        $users = User::whereNotNull('mt4_account')->get();
        foreach ($users as $key => $user){

         if ($user->deposits->isEmpty()) {
             $dateRegister= $user->created_at;
             $dateNow = \Carbon\Carbon::now();
             $days = $dateNow->diffInDays($dateRegister);

             if ($days > 7){

              $user->forex_signals = 1;
              $user->save();

             }

         }


        }


    }
}
