<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotifikasiTransaksi extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $dataMail;
    /**
     * Create a new message instance.
     */
    public function __construct($dataMail)
    {
        $this->dataMail = $dataMail;
    }

    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'))
            ->view('email.notifikasi-transaksi')
            ->with('data', $this->dataMail);
    }
}
