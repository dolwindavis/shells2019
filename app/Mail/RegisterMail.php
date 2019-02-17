<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username,$name)
    {

        $this->username=$username;
        $this->name=$name;

        

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $username=$this->username;
        $name=$this->name;
        return $this->view('mail',compact('username','name'));
    }
}
