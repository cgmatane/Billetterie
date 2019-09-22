<?php

namespace App\Statics\Views\interfaces\choix_deux_options\pages;

use App\Statics\Views\interfaces\choix_deux_options\DonneesVueChoixDeuxOptions;

class DonneesVueReservationChoixVehicule extends DonneesVueChoixDeuxOptions
{
    public function __construct()
    {
        parent::__construct();
        $this->setDonneeVue('question','Voyagez-vous avec un véhicule ?');
        $this->setDonneeVue('lien_choix1', route('reservation_choix_voiture'));
        $this->setDonneeVue('lien_choix2', route('reservation_passagers'));
    }
}
