<?php


namespace App\Statics\Views\interfaces\administration;

use App\Statics\Views\DonneesVue;

class DonneesVueTypeVehicule extends DonneesVue
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        $this->nomVue = 'gestion';
        $this->setDonneeVue('titre','Administration');
        $this->setDonneeVue('type','types de véhicule');
        $colonnes = [
            '#',
            'Nom',
            'Tarif',
        ];
        $this->setDonneeVue('colonnes',$colonnes);


    }
}
