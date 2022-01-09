<?php

namespace ConfettiCode\Laravel\Foundation\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailTest extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('foundation::emails.test')
            ->subject('Check whether mail component work properly');
    }
}
