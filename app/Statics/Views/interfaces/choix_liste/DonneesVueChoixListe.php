<?php


namespace App\Statics\Views\interfaces\choix_liste;

use App\Statics\Views\DonneesVue;

abstract class DonneesVueChoixListe extends DonneesVue
{
    public function __construct()
    {
        parent::__construct();
        $this->nomVue = 'choix_liste';

        $this->setDonneeVue('titre', self::VALEUR_PAR_DEFAUT);
    }
}
