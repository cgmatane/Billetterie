<?php


namespace App\Statics\Views;

use App\Statics\Views\DonneesVue;


//Ici toutes les statiques communes a plusieurs vues (non issus de la meme template)
class DonneesVueGlobales extends DonneesVue
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        $this->nomVue = 'global';
        $this->setDonneeVue('traverse',['Matane Côte-Nord','h']);
        $this->setDonneeVue('retour_precedent', ['Retour','h']);
        $this->setDonneeVue('retour_choix_precedent',['Retour choix précédent','h']);
        $this->setDonneeVue('retour_accueil', ['Accueil','h']);
        $this->setDonneeVue('retour_au_debut', ['Recommencer','h']);
        $this->setDonneeVue('titre', ['Billetterie - STQ','h']);
        $this->setDonneeVue('informations', ['Informations', 'h']);
        $this->setDonneeVue('billetterie', ['Billetterie', 'h']);
        $this->setDonneeVue('STQ', 'STQ');
        $this->setDonneeVue('CAD', 'CAD');
        $this->setDonneeVue('activer_javascript', ['Ce site a besoin de javascript','h']);
    }
}
