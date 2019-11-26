<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public $type;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($type,$data)
    {
        $this->type = $type;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->type == 'confirmation'){
            return $this->from('confirmation@stq.com')
                ->subject('Confirmation reservation billet STQ')
                ->view('dynamic_email_template')
                ->with('data', $this->data)
                ->attach($this->data['emplacementPdfBillet'])
                ->attach($this->data['emplacementPdfFacture']);
        }else{
            return $this->from('confirmation@stq.com')
                ->subject('Annulation de votre trajet')
                ->view('dynamic_annulation_email_template')
                ->with('data', $this->data);
        }
    }
}

?>
