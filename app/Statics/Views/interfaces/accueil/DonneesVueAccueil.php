<?php

namespace App\Statics\Views\interfaces\accueil;

use App\Statics\Views\DonneesVue;

class DonneesVueAccueil extends DonneesVue
{
    public function __construct()
    {
        parent::__construct();
        /* Nom de la vue en snake_case */
        $this->nomVue = 'accueil';

        /* Les cles sont en snake_case */
        $this->setDonneeVue('depart','Départ');
        $this->setDonneeVue('choix_destination_heure_depart','Choisissez une destination/heure de départ');
        $this->setDonneeVue('choix_autre_date','Choisir une autre date');
        $this->setDonneeVue('choix_autre_depart','Choisir un autre départ');
    }
}
