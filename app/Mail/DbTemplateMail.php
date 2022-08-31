<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DbTemplateMail extends Mailable
{
    // all public properties pass to the view as variables
    public $template;
    
    public function __construct($template)
    {
        $this->template = $template;
    }
    
    public function build()
    {
        return $this->view('emails.testMail');
    }
}
