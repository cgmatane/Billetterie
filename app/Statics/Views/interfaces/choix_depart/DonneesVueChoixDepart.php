<?php

namespace App\Statics\Views\interfaces\choix_depart;

use App\Statics\Views\DonneesVue;

class DonneesVueChoixDepart extends DonneesVue
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        $this->nomVue = 'choix_depart';
        $this->setDonneeVue('titre', ['Sélectionnez un lieu de départ','Select a place of departure']);
        $this->setDonneeVue('titre_page', ['Billetterie - Lieu de départ','Ticketing - Place of departure']);
    }
}
