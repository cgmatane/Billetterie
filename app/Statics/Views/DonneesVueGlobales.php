<?php


namespace App\Statics\Views;

use App\Statics\Views\DonneesVue;


//Ici toutes les statiques communes a plusieurs vues (non issus de la meme template)
class DonneesVueGlobales extends DonneesVue
{
    public function __construct()
    {
        parent::__construct();
        $this->nomVue = 'global';
        $this->setDonneeVue('traverse','Matane Côte-Nord');
        $this->setDonneeVue('retour_precedent', 'Retour');
        $this->setDonneeVue('retour_choix_precedent','Retour choix précédent');
        $this->setDonneeVue('retour_accueil', 'Accueil');
        $this->setDonneeVue('retour_au_debut', 'Recommencer');
    }
}
