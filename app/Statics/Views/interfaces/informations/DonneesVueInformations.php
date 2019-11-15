<?php


namespace App\Statics\Views\interfaces\informations;

use App\Statics\Views\DonneesVue;

abstract class DonneesVueInformations extends DonneesVue
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        $this->nomVue = 'informations';
        $this->setDonneeVue('titre', self::VALEUR_PAR_DEFAUT);
        $this->setDonneeVue('contenu', self::VALEUR_PAR_DEFAUT);
    }
}
