<?php

namespace App\Statics\Views\interfaces\choix_date;

use App\Statics\Views\DonneesVue;

class DonneesVueChoixDate extends DonneesVue
{
    public function __construct()
    {
        parent::__construct();
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
