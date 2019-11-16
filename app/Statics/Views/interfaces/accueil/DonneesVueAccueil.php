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
        $this->setDonneeVue('depart',['Départs','Departures']);
        $this->setDonneeVue('choix_destination_heure_depart',['Choisissez une destination/heure de départ','Choose a destination/departure time']);
        $this->setDonneeVue('choix_autre_date',['Choisir une autre date','Choose another date']);
        $this->setDonneeVue('choix_autre_depart',['Choisir un autre départ','Choose another departure']);
        $this->setDonneeVue('commande_validee', ['Commande validée !', 'Validated command !']);
        $this->setDonneeVue('mail_envoye', ['Un mail vous a été envoyé.', 'A mail has been sent to you.']);

    }
}
