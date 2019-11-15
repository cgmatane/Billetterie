<?php

namespace App\Statics\Views\interfaces\choix_date;

use App\Statics\Views\DonneesVue;

class DonneesVueChoixDate extends DonneesVue
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        $this->setDonneeVue('titre', ['Sélectionnez une date de départ', 'h']);
        $this->setDonneeVue('lundi', ['LUN', 'h']);
        $this->setDonneeVue('mardi', ['MAR', 'h']);
        $this->setDonneeVue('mercredi', ['MER','h']);
        $this->setDonneeVue('jeudi', ['JEU','h']);
        $this->setDonneeVue('vendredi', ['VEN','h']);
        $this->setDonneeVue('samedi', ['SAM','h']);
        $this->setDonneeVue('dimanche', ['DIM','h']);
        $this->nomVue = 'choix_date';
    }
}
