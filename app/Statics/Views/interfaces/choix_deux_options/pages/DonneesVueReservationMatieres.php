<?php

namespace App\Statics\Views\interfaces\choix_deux_options\pages;

use App\Statics\Views\interfaces\choix_deux_options\DonneesVueChoixDeuxOptions;

class DonneesVueReservationMatieres extends DonneesVueChoixDeuxOptions
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        $this->setDonneeVue('question',['Voyagerez-vous avec des matières dangereuses ?','Do you travel with dangerous materials ?']);
        $this->setDonneeVue('icone1','fas fa-skull-crossbones ');
        $this->setDonneeVue('icone2','far fa-times-circle');
        $this->setDonneeVue('lien_choix1', route('informations_matieres'));
        $this->setDonneeVue('lien_choix2', route('reservation_passagers'));
        $this->setDonneeVue('titre_page', ['Billetterie - Matières dangereuses','Ticketing - Dangerous materials']);
    }
}
