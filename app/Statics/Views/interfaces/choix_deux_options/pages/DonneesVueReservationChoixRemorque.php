<?php

namespace App\Statics\Views\interfaces\choix_deux_options\pages;

use App\Statics\Views\interfaces\choix_deux_options\DonneesVueChoixDeuxOptions;

class DonneesVueReservationChoixRemorque extends DonneesVueChoixDeuxOptions
{
    public function __construct()
    {
        parent::__construct();
        $this->setDonneeVue('question','Votre voiture possède-t-elle une remorque ?');
        $this->setDonneeVue('lien_choix1', route('reservation_poids'));
        $this->setDonneeVue('lien_choix2', route('reservation_poids'));
    }
}
