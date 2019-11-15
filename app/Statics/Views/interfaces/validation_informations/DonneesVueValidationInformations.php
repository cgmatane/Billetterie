<?php


namespace App\Statics\Views\interfaces\validation_informations;


use App\Statics\Views\DonneesVue;

class DonneesVueValidationInformations extends DonneesVue
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        $this->nomVue = 'validation_informations';
        $this->setDonneeVue('recapitulatif_billet','Récapitulatif du billet');
        $this->setDonneeVue('traversee', 'Traversée');
        $this->setDonneeVue('date','Date :');
        $this->setDonneeVue('depart','Départ :');
        $this->setDonneeVue('heure_depart','Heure de départ :');
        $this->setDonneeVue('arrivee','Arrivée :');
        $this->setDonneeVue('prix','Prix :');
        $this->setDonneeVue('dollar_canadien','CAD');
        $this->setDonneeVue('vous_contacter', 'Pour vous contacter');
        $this->setDonneeVue('courriel','Votre courriel :');
        $this->setDonneeVue('numero_telephone','Votre numéro de téléphone :');
        $this->setDonneeVue('passagers', 'Passagers');
        $this->setDonneeVue('nom','Nom');
        $this->setDonneeVue('prenom','Prénom');
        $this->setDonneeVue('age','Âge');
        $this->setDonneeVue('tarif','Tarif');
        $this->setDonneeVue('vehicule','Véhicule');
        $this->setDonneeVue('vehicule_soute','Véhicule en soute :');
        $this->setDonneeVue('charge_lourde','Charge lourde :');
        $this->setDonneeVue('oui','Oui');
        $this->setDonneeVue('non','Non');
        $this->setDonneeVue('valider_informations_billet','VALIDER LES INFORMATIONS DE MON BILLET');

    }
}
