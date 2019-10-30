<?php

namespace App\Statics\Views\interfaces\administration;

use App\Statics\Views\DonneesVue;

class DonneesVueProgrammation extends DonneesVue
{
    public function __construct()
    {
        parent::__construct();
        $this->nomVue = 'gestion';
        $this->setDonneeVue('titre','Administration');
        $this->setDonneeVue('type','planification');
        $colonnes = [
            '#',
            'Nom',
            'Date de depart',
            'Date d\'arrivée',
            'Annulation',
            'Action'
        ];
        $this->setDonneeVue('colonnes',$colonnes);



    }
}
