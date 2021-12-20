<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderItemEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $orderItem;

    public function __construct($orderItem)
    {
        $this->orderItem = $orderItem;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.order_item');
    }
}
