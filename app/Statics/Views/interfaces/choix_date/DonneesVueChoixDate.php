<?php

namespace App\Statics\Views\interfaces\choix_date;

use App\Statics\Views\DonneesVue;

class DonneesVueChoixDate extends DonneesVue
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        $this->setDonneeVue('titre', ['Sélectionnez une date de départ', 'Select a date of departure']);
        $this->setDonneeVue('lundi', ['LUN', 'MON']);
        $this->setDonneeVue('mardi', ['MAR', 'TUE']);
        $this->setDonneeVue('mercredi', ['MER','WED']);
        $this->setDonneeVue('jeudi', ['JEU','THU']);
        $this->setDonneeVue('vendredi', ['VEN','FRI']);
        $this->setDonneeVue('samedi', ['SAM','SAT']);
        $this->setDonneeVue('dimanche', ['DIM','SUN']);
        $this->nomVue = 'choix_date';
    }
}
