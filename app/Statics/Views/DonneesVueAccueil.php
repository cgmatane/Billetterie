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
            'depart'=>'Départ',
            'choix_destination_heure_depart'=>'Choisissez une destination/heure de départ',
            'choix_autre_date'=>'Choisir une autre date',
            'choix_autre_depart'=>'Choisir un autre départ',
        ];
    }
}
