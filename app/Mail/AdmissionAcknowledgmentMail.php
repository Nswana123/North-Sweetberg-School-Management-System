<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdmissionAcknowledgmentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $referenceNumber;
    public $programName;

    public function __construct($name, $referenceNumber, $programName)
    {
        $this->name = $name;
        $this->referenceNumber = $referenceNumber;
        $this->programName = $programName;
    }

    public function build()
    {
        return $this->subject('Admission Application Received')
                    ->view('emails.admission_acknowledgment');
    }
}