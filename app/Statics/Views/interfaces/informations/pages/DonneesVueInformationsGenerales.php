<?php

namespace App\Statics\Views\interfaces\informations\pages;

use App\Statics\Views\interfaces\informations\DonneesVueInformations;

class DonneesVueInformationsGenerales extends DonneesVueInformations
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        $this->setDonneeVue('titre', ['Informations', 'Informations']);
        $this->setDonneeVue('a_savoir', ['À savoir avant de partir : ', 'What your need to know before departure : ']);
        $this->setDonneeVue('conditions_climatiques', ['Les traverses sont soumises aux conditions climatiques :', 'Cruises are subject to climatic conditions :']);
        $this->setDonneeVue('traverses_annulees', ['Elles peuvent donc êtres annulées à tout moment', 'This means they can be cancelled any time']);
        $this->setDonneeVue('cas_annulation', ['En cas d\'annulation, ne vous inquiétez pas vous serez remboursé automatiquement !','In case of cancellation, dont worry you will be refund automatically!']);
        $this->setDonneeVue('plus_dinfos', ['Plus d\'infos sur le site de ', 'More info of this website : ']);
        $this->setDonneeVue('quebec_meteo', ['Québec météo','Quebec meteo']);
        $this->setDonneeVue('presentation_embarquement', ['Vous devez vous présenter à l\'embarquement 15 minutes avant l\'heure de départ','You have to get aboard 15 minutes before the hour of departure']);
    }
}
