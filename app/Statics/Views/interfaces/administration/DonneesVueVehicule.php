<?php


namespace App\Statics\Views\interfaces\administration;

use App\Statics\Views\DonneesVue;

class DonneesVueVehicule extends DonneesVue
{
    public function __construct()
    {
        parent::__construct();
        $this->nomVue = 'gestion';
        $this->setDonneeVue('titre','Administration');
        $this->setDonneeVue('type','vehicule');
        $colonnes = [
            '#',
            'Nom',
            'Place piéton',
            'Place vehicule',
            'Action'
        ];
        $this->setDonneeVue('colonnes',$colonnes);


    }
}
