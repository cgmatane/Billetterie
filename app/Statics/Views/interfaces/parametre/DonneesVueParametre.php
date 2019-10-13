<?php

namespace App\Statics\Views\interfaces\parametre;

use App\Statics\Views\DonneesVue;

class DonneesVueParametre extends DonneesVue
{
    public function __construct()
    {
        parent::__construct();
        $this->nomVue = 'parametre';
        $this->setDonneeVue('titre','Administration');


    }
}
