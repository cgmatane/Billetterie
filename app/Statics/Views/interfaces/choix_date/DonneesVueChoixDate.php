<?php

namespace App\Statics\Views\interfaces\choix_date;

use App\Statics\Views\DonneesVue;

class DonneesVueChoixDate extends DonneesVue
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        $this->setDonneeVue('titre', 'Sélectionnez une date de départ');
        $this->setDonneeVue('lundi', 'LUN');
        $this->setDonneeVue('mardi', 'MAR');
        $this->setDonneeVue('mercredi', 'MER');
        $this->setDonneeVue('jeudi', 'JEU');
        $this->setDonneeVue('vendredi', 'VEN');
        $this->setDonneeVue('samedi', 'SAM');
        $this->setDonneeVue('dimanche', 'DIM');
        $this->nomVue = 'choix_date';
    }
}
