<?php

namespace App\Statics\Views\interfaces\accueil;

use App\Statics\Views\DonneesVue;
use Illuminate\Http\Request;

class DonneesVueAccueil extends DonneesVue
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        /* Nom de la vue en snake_case */
        $this->nomVue = 'accueil';

        /* Les cles sont en snake_case */
        $this->setDonneeVue('depart',['Départs','h']);
        $this->setDonneeVue('choix_destination_heure_depart',['Choisissez une destination/heure de départ','h']);
        $this->setDonneeVue('choix_autre_date',['Choisir une autre date','h']);
        $this->setDonneeVue('choix_autre_depart',['Choisir un autre départ','h']);
        $this->setDonneeVue('commande_validee', ['Commande validée !', 'h']);
        $this->setDonneeVue('mail_envoye', ['Un mail vous a été envoyé.', 'h']);

    }
}
