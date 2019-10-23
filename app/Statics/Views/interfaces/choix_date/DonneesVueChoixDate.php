<?php

namespace App\Statics\Views\interfaces\choix_date;

use App\Statics\Views\DonneesVue;

class DonneesVueChoixDate extends DonneesVue
{
    public function __construct()
    {
        parent::__construct();
        $this->setDonneeVue('titre', 'Sélectionnez une date de départ');
        $this->nomVue = 'choix_date';
    }
}
