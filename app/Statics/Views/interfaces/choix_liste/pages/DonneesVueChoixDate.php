<?php

namespace App\Statics\Views\interfaces\choix_liste\pages;

use App\Statics\Views\interfaces\choix_liste\DonneesVueChoixListe;

class DonneesVueChoixDate extends DonneesVueChoixListe
{
    public function __construct()
    {
        parent::__construct();
        $this->setDonneeVue('titre', 'Sélectionnez une date de départ');
    }
}