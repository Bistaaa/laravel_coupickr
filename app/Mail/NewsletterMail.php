<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\NewsletterUser;

class NewsletterMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $subscriber;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(NewsletterUser $subscriber)
    {
        $this->subscriber = $subscriber;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Newsletter Mail')
            ->view('emails.newsletter')
            ->with(['unsubscribeToken' => $this->subscriber->unsubscribe_token]);
    }
}
