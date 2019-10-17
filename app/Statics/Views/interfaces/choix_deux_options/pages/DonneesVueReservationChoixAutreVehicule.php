<?php

namespace App\Statics\Views\interfaces\choix_deux_options\pages;

use App\Statics\Views\interfaces\choix_deux_options\DonneesVueChoixDeuxOptions;

class DonneesVueReservationChoixAutreVehicule extends DonneesVueChoixDeuxOptions
{
    public function __construct()
    {
        parent::__construct();
        $this->setDonneeVue('question','De quel type est votre véhicule ?');
        $this->setDonneeVue('icone1','');
        $this->setDonneeVue('icone2','');
        $this->setDonneeVue('choix1', 'Camionnette');
        $this->setDonneeVue('choix2', 'Poids lourd');
        $this->setDonneeVue('lien_choix1', route('reservation_poids'));
        $this->setDonneeVue('lien_choix2', route('reservation_poids'));
    }
}
