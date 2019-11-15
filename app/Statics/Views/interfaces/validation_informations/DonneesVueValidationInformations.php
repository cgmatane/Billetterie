<?php


namespace App\Statics\Views\interfaces\validation_informations;


use App\Statics\Views\DonneesVue;

class DonneesVueValidationInformations extends DonneesVue
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        $this->nomVue = 'validation_informations';
        $this->setDonneeVue('recapitulatif_billet',['Récapitulatif du billet','h']);
        $this->setDonneeVue('traversee', ['Traversée','h']);
        $this->setDonneeVue('date',['Date :','h']);
        $this->setDonneeVue('depart',['Départ :','h']);
        $this->setDonneeVue('heure_depart',['Heure de départ :','h']);
        $this->setDonneeVue('arrivee',['Arrivée :','h']);
        $this->setDonneeVue('prix',['Prix :','h']);
        $this->setDonneeVue('dollar_canadien','CAD');
        $this->setDonneeVue('immatriculation', 'Numéro d\'immatriculation');
        $this->setDonneeVue('vous_contacter', ['Pour vous contacter','h']);
        $this->setDonneeVue('courriel',['Votre courriel :','h']);
        $this->setDonneeVue('numero_telephone',['Votre numéro de téléphone :','h']);
        $this->setDonneeVue('passagers', ['Passagers','h']);
        $this->setDonneeVue('nom',['Nom','h']);
        $this->setDonneeVue('prenom',['Prénom','h']);
        $this->setDonneeVue('age',['Âge','h']);
        $this->setDonneeVue('tarif',['Tarif','h']);
        $this->setDonneeVue('vehicule',['Véhicule','h']);
        $this->setDonneeVue('vehicule_soute',['Véhicule en soute :','h']);
        $this->setDonneeVue('charge_lourde',['Charge lourde :','h']);
        $this->setDonneeVue('oui',['Oui','h']);
        $this->setDonneeVue('non',['Non','h']);
        $this->setDonneeVue('valider_informations_billet',['VALIDER LES INFORMATIONS DE MON BILLET','h']);

    }
}
