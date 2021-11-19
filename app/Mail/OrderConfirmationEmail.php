<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirmationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($_mail)
    {
        $this->mail=$_mail;
    }

    /**
     * Build the message.
     *public function build()
   * {
    *    $lead = $this->lead;
    *    return $this->replyTo($this->lead->email)->view('admin.email.body', compact('lead'));
   * }
     * @return $this
     */
    public function build()
    {
        $mail=$this->mail;
        return $this->replyTo($this->mail)->view('mail.orderConfirmation');
    }
}
