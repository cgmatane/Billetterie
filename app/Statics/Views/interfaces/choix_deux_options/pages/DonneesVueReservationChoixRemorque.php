<?php

namespace App\Statics\Views\interfaces\choix_deux_options\pages;

use App\Statics\Views\interfaces\choix_deux_options\DonneesVueChoixDeuxOptions;

class DonneesVueReservationChoixRemorque extends DonneesVueChoixDeuxOptions
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        $this->setDonneeVue('question',['Votre voiture possède-t-elle une remorque ?','Does your vehicle have a trailer ?']);
        $this->setDonneeVue('icone1','');
        $this->setDonneeVue('icone2','');
        $this->setDonneeVue('lien_choix1', route('reservation_poids'));
        $this->setDonneeVue('lien_choix2', route('reservation_poids'));
    }
}
