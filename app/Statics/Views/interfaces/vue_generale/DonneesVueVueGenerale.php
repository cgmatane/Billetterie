<?php

namespace App\Statics\Views\interfaces\vue_generale;

use App\Statics\Views\DonneesVue;

class DonneesVueVueGenerale extends DonneesVue
{
    public function __construct()
    {
        parent::__construct();
        $this->nomVue = 'vue_generale';
        $this->setDonneeVue('titre','Administration');


    }
}
