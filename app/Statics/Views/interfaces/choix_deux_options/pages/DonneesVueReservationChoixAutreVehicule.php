<?php

namespace App\Statics\Views\interfaces\choix_deux_options\pages;

use App\Statics\Views\interfaces\choix_deux_options\DonneesVueChoixDeuxOptions;

class DonneesVueReservationChoixAutreVehicule extends DonneesVueChoixDeuxOptions
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        $this->setDonneeVue('question',['De quel type est votre véhicule ?','h']);
        $this->setDonneeVue('icone1',['','h']);
        $this->setDonneeVue('icone2',['','h']);
        $this->setDonneeVue('choix1', ['Camionnette','h']);
        $this->setDonneeVue('choix2', ['Poids lourd','h']);
        $this->setDonneeVue('lien_choix1', route('reservation_poids'));
        $this->setDonneeVue('lien_choix2', route('reservation_poids'));
    }
}
