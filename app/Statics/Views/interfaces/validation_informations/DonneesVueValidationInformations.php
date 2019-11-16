<?php


namespace App\Statics\Views\interfaces\validation_informations;


use App\Statics\Views\DonneesVue;

class DonneesVueValidationInformations extends DonneesVue
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        $this->nomVue = 'validation_informations';
        $this->setDonneeVue('recapitulatif_billet',['Récapitulatif du billet','Summary of the ticket']);
        $this->setDonneeVue('traversee', ['Traversée','Voyage']);
        $this->setDonneeVue('date',['Date :','Date :']);
        $this->setDonneeVue('depart',['Départ :','Departure :']);
        $this->setDonneeVue('heure_depart',['Heure de départ :','Hour of departure :']);
        $this->setDonneeVue('arrivee',['Arrivée :','Arrival :']);
        $this->setDonneeVue('prix',['Prix :','Price :']);
        $this->setDonneeVue('dollar_canadien','CAD');
        $this->setDonneeVue('immatriculation', ['Numéro d\'immatriculation :', 'Vehicle registration number :']);
        $this->setDonneeVue('vous_contacter', ['Pour vous contacter','To contact you']);
        $this->setDonneeVue('courriel',['Votre courriel :','Your e-mail :']);
        $this->setDonneeVue('numero_telephone',['Votre numéro de téléphone :','Your phone number :']);
        $this->setDonneeVue('passagers', ['Passagers','Passengers']);
        $this->setDonneeVue('nom',['Nom','Name']);
        $this->setDonneeVue('prenom',['Prénom','First name']);
        $this->setDonneeVue('age',['Âge','Age']);
        $this->setDonneeVue('tarif',['Tarif','Tariff']);
        $this->setDonneeVue('vehicule',['Véhicule','Vehicle']);
        $this->setDonneeVue('vehicule_soute',['Véhicule :','Vehicle :']);
        $this->setDonneeVue('charge_lourde',['Charge lourde :','Heavy weight :']);
        $this->setDonneeVue('oui',['Oui','Yes']);
        $this->setDonneeVue('non',['Non','No']);
        $this->setDonneeVue('valider_informations_billet',['VALIDER LES INFORMATIONS DE MON BILLET','CONFIRM THE DETAILS OF MY TICKET']);

    }
}
