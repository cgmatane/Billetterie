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
        $this->setDonneeVue('traverse','Matane Côte-Nord');
        $this->setDonneeVue('retour_precedent', ['Retour','Return']);
        $this->setDonneeVue('retour_choix_precedent',['Retour choix précédent','Back to previous choice']);
        $this->setDonneeVue('retour_accueil', ['Accueil','Home']);
        $this->setDonneeVue('retour_au_debut', ['Recommencer','Start over']);
        $this->setDonneeVue('titre', ['Billetterie - STQ','Ticketing - STQ']);
        $this->setDonneeVue('informations', ['Informations', 'Informations']);
        $this->setDonneeVue('changer_langue', ['Changer de langue', 'change language']);
        $this->setDonneeVue('billetterie', ['Billetterie', 'Ticketing']);
        $this->setDonneeVue('STQ', 'STQ');
        $this->setDonneeVue('CAD', 'CAD');
        $this->setDonneeVue('activer_javascript', ['Ce site a besoin de Javascript','This website requires Javascript']);
        $this->setDonneeVue('mois', [
            ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
            ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        ]);
    }
}
