<?php

namespace App\Statics\Views\interfaces\choix_deux_options\pages;

use App\Statics\Views\interfaces\choix_deux_options\DonneesVueChoixDeuxOptions;

class DonneesVueReservationChoixVehicule extends DonneesVueChoixDeuxOptions
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        $this->setDonneeVue('question',['Voyagez-vous avec un véhicule ?','Do you travel with a vehicle ?']);
        $this->setDonneeVue('icone1','fas fa-car');
        $this->setDonneeVue('icone2','far fa-times-circle');
        $this->setDonneeVue('lien_choix1', route('reservation_choix_voiture'));
        $this->setDonneeVue('lien_choix2', route('reservation_passagers'));
        $this->setDonneeVue('titre_page', ['Billetterie - Moyen de transport','Ticketing - Means of transport']);
    }
}
