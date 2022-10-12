<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerOrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $customer_name;
    public $pizza_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customer_name,$pizza_name)
    {
        $this->customer_name = $customer_name;
        $this->pizza_name = $pizza_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.customersMail',[
            'customer_name' => $this->customer_name,
            'pizza_name' => $this->pizza_name,
        ]);
    }
}
