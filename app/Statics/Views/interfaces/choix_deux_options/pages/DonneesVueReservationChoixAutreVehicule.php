<?php

namespace App\Statics\Views\interfaces\choix_deux_options\pages;

use App\Statics\Views\interfaces\choix_deux_options\DonneesVueChoixDeuxOptions;

class DonneesVueReservationChoixAutreVehicule extends DonneesVueChoixDeuxOptions
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        $this->setDonneeVue('question',['De quel type est votre véhicule ?','What is the type of your vehicle']);
        $this->setDonneeVue('icone1','');
        $this->setDonneeVue('icone2','');
        $this->setDonneeVue('choix1', ['Camionnette','Transporter']);
        $this->setDonneeVue('choix2', ['Poids lourd','Truck']);
        $this->setDonneeVue('lien_choix1', route('reservation_poids'));
        $this->setDonneeVue('lien_choix2', route('reservation_poids'));
        $this->setDonneeVue('titre_page', ['Billetterie - Autres véhicules','Ticketing - Other vehicle']);
    }
}
