<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BloodRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $receiverName;
    public $receiverEmail;
    public $bloodGroup;
    public $receiverMobile;

    /**
     * Create a new message instance.
     */
    public function __construct($receiverName, $receiverEmail, $bloodGroup, $receiverMobile)
    {
        $this->receiverName = $receiverName;
        $this->receiverEmail = $receiverEmail;
        $this->bloodGroup = $bloodGroup;
        $this->receiverMobile = $receiverMobile;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Urgent Blood Donation Request')
            ->view('emails.mailFormat')
            ->with([
                'receiverName' => $this->receiverName,
                'receiverEmail' => $this->receiverEmail,
                'receiverMobile' => $this->receiverMobile,
                'bloodGroup' => $this->bloodGroup,
            ]);
    }
}
