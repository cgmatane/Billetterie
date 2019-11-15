<?php


namespace App\Statics\Views\interfaces\administration;


use App\Statics\Views\DonneesVue;

class DonneesVueStation extends DonneesVue
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        $this->nomVue = 'gestion';
        $this->setDonneeVue('titre','Administration');
        $this->setDonneeVue('type','station');
        $colonnes = [
            '#',
            'Nom',
            'Action'
        ];
        $this->setDonneeVue('colonnes',$colonnes);


    }
}
