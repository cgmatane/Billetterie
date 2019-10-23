<?php

namespace App\Statics\Views\interfaces\choix_depart;

use App\Statics\Views\DonneesVue;

class DonneesVueChoixDepart extends DonneesVue
{
    public function __construct()
    {
        parent::__construct();
        $this->setDonneeVue('titre', 'Sélectionnez un lieu de départ');
        $this->nomVue = 'choix_depart';
    }
}