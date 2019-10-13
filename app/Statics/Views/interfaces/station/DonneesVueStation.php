<?php


namespace App\Statics\Views\interfaces\station;


use App\Statics\Views\DonneesVue;

class DonneesVueStation extends DonneesVue
{
    public function __construct()
    {
        parent::__construct();
        $this->nomVue = 'station';
        $this->setDonneeVue('titre','Administration');


    }
}
