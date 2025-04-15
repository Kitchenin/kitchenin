<?php

namespace App\Mail;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderReceivedClient extends Mailable
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
        $this->subject = 'Your order to kitchenin.co.uk has been received';
        $this->attachment = $attachment;
        $this->bcc('kitchenin.co.uk+1a710e8b8d@invite.trustpilot.com');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.orderReceivedClient')->attach($this->attachment);
    }
}
