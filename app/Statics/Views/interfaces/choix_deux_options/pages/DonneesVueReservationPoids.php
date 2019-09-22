<?php

namespace App\Statics\Views\interfaces\choix_deux_options\pages;

use App\Statics\Views\interfaces\choix_deux_options\DonneesVueChoixDeuxOptions;

class DonneesVueReservationPoids extends DonneesVueChoixDeuxOptions
{
    public function __construct()
    {
        parent::__construct();
        $this->setDonneeVue('question','Votre véhicule dépasse t-il xxx Kg ?');
        $this->setDonneeVue('lien_choix1', route('reservation_matieres'));
        $this->setDonneeVue('lien_choix2', route('reservation_matieres'));
    }
}
