<?php

namespace App\Statics\Views\interfaces\choix_deux_options\pages;

use App\Statics\Views\interfaces\choix_deux_options\DonneesVueChoixDeuxOptions;
use App\Vehicule;

class DonneesVueReservationPoids extends DonneesVueChoixDeuxOptions
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        $this->setDonneeVue('question',['Votre véhicule dépasse t-il '.Vehicule::LIMITE_POIDS_ELEVE.' Kg ?','Does your vehicle exceed '.Vehicule::LIMITE_POIDS_ELEVE.' Kg ?']);
        $this->setDonneeVue('icone1','fas fa-weight-hanging');
        $this->setDonneeVue('icone2','far fa-times-circle');
        $this->setDonneeVue('lien_choix1', route('reservation_matieres'));
        $this->setDonneeVue('lien_choix2', route('reservation_matieres'));
        $this->setDonneeVue('titre_page', ['Billetterie - Dépassement de poids','Ticketing - Overweight']);
    }
}
