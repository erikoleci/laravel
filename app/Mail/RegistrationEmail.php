<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
//    public $data;

    public $login, $pass, $client;

    public function __construct($login, $pass, $client)
    {
        $this->login=$login;
        $this->pass=$pass;
        $this->client=$client;
        //
//        $this->data=$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@fgm-group.com', 'FGM')
            ->subject('Registration Email')
            ->view('mails.registration_'.$this->client['account_id']);
    }
}
