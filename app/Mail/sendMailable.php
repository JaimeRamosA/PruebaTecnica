<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\correo;

class sendMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "informacion 2";
    public $correo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(correo $correo)
    {
        $this->correo = $correo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('correo.send');
    }
}
