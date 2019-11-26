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
        $this->setDonneeVue('infos_trajet', ['Informations sur la traverse', 'Informations on the crossing']);
        $this->setDonneeVue('mail_envoye', ['Un mail vous a été envoyé à l\'adresse : ', 'A mail has been sent to the following address : ']);
        $this->setDonneeVue('trajet_arrive', ['Cette traverse arrive le ', 'This crossing arrives at his destination the ']);
        $this->setDonneeVue('a', [' à ',' at ']);
        $this->setDonneeVue('navire_utilise', ['Le navire utilisé pour cette traverse est le ', 'The ferry for this crossing is the ']);
        $this->setDonneeVue('reste', ['Il reste ', 'There is ']);
        $this->setDonneeVue('place_passagers', [' places passager pour cette traverse.', 'passenger places left for this crossing.']);
        $this->setDonneeVue('place_vehicules', [' places véhicule pour cette traverse.', 'vehicle places left for this crossing.']);
    }
}
