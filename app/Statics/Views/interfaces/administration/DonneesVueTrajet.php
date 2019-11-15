<?php

namespace App\Statics\Views\interfaces\administration;

use App\Statics\Views\DonneesVue;

class DonneesVueTrajet extends DonneesVue
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        $this->nomVue = 'gestion';
        $this->setDonneeVue('titre','Administration');
        $this->setDonneeVue('type','trajet');
        $colonnes = [
            '#',
            'Station départ',
            'Station arrivé',
            'Navire',
            'Action'
        ];
        $this->setDonneeVue('colonnes',$colonnes);


    }
}
