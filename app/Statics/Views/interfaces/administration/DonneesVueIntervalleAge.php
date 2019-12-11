<?php


namespace App\Statics\Views\interfaces\administration;

use App\Statics\Views\DonneesVue;

class DonneesVueIntervalleAge extends DonneesVue
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        $this->nomVue = 'gestion';
        $this->setDonneeVue('titre','Administration');
        $this->setDonneeVue('type','intervalles d\'âge');
        $colonnes = [
            '#',
            'Âge min',
            'Âge max',
            'Tarif',
        ];
        $this->setDonneeVue('colonnes',$colonnes);


    }
}
