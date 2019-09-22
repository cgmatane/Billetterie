<?php

namespace App\Statics\Views\interfaces\choix_deux_options\pages;

use App\Statics\Views\interfaces\choix_deux_options\DonneesVueChoixDeuxOptions;

class DonneesVueReservationChoixVoiture extends DonneesVueChoixDeuxOptions
{
    public function __construct()
    {
        parent::__construct();
        $this->setDonneeVue('question','Votre véhicule est-il une voiture ?');
        $this->setDonneeVue('lien_choix1', route('reservation_choix_remorque'));
        $this->setDonneeVue('lien_choix2', route('reservation_choix_autre_vehicule'));
    }
}
