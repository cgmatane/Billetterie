<?php

namespace App\Statics\Views\interfaces\planification;

use App\Statics\Views\DonneesVue;

class DonneesVuePlanification extends DonneesVue
{
    public function __construct()
    {
        parent::__construct();
        $this->nomVue = 'planification';
        $this->setDonneeVue('titre','Administration');


    }
}
