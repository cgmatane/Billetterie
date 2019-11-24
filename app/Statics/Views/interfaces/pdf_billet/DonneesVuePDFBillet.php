<?php

namespace App\Statics\Views\interfaces\pdf_billet;

use App\Statics\Views\DonneesVue;

class DonneesVuePDFBillet extends DonneesVue
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        $this->nomVue = 'pdf_billet';
        $this->setDonneeVue('billet',['Billet', 'Ticket']);
        $this->setDonneeVue('date_emission',['Date d\'émission :', 'Sending date :']);
    }
}
