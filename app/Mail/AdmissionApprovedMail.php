<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdmissionApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $studentNumber;
    public $password;
    public $loginUrl;

    public function __construct($studentNumber, $password)
    {
        $this->studentNumber = $studentNumber;
        $this->password = $password;
        $this->loginUrl = config('app.url') . '/login';
    }

    public function build()
    {
        return $this->subject('Your Admission Has Been Approved')
                    ->view('emails.admission_approved');
    }
}