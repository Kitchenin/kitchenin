<?php

namespace App\Mail;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderReceivedAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $subject;
    public $attachment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order, $attachment)
    {
        $this->order = $order;
        $this->subject = 'New order received from the Kitchenin website';
        $this->attachment = $attachment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.orderReceivedAdmin')->attach($this->attachment);
    }
}
