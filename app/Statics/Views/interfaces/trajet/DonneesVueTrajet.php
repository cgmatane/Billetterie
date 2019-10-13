<?php

namespace App\Statics\Views\interfaces\trajet;

use App\Statics\Views\DonneesVue;

class DonneesVueTrajet extends DonneesVue
{
    public function __construct()
    {
        parent::__construct();
        $this->nomVue = 'trajet';
        $this->setDonneeVue('titre','Administration');


    }
}
