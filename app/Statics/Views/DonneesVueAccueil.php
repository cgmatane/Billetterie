<?php

namespace App\Statics\Views;

class DonneesVueAccueil extends DonneesVue
{
    private $traverse;

    public function __construct()
    {
        parent::__construct();
        $this->nomVue = 'accueil';
        $this->donneesVue = [
            'choix_destination_heure_depart'=>'Choisissez une destination/heure de départ',
        ];
    }
}
