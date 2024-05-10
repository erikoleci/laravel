<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TransactionEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $email, $amount;

    public function __construct($email, $amount)
    {
        $this->email=$email;
        $this->amount=$amount;
    
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@fgm-group.com', 'FGM')
            ->subject('Deposit')
            ->view('mails.deposit_mail');
    }
}
