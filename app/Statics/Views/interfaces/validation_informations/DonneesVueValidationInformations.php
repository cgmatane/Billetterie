<?php


namespace App\Statics\Views\interfaces\validation_informations;


use App\Statics\Views\DonneesVue;

class DonneesVueValidationInformations extends DonneesVue
{
    public function __construct()
    {
        parent::__construct();
        $this->nomVue = 'validation_informations';
        $this->setDonneeVue('recapitulatif_billet','Récapitulatif du billet');
        $this->setDonneeVue('depart','Départ à');
        $this->setDonneeVue('arrivee','Arrivée');
        $this->setDonneeVue('prix','Prix');
        $this->setDonneeVue('courriel','Votre courriel :');
        $this->setDonneeVue('numero_telephone','Votre numéro de téléphone :');
        $this->setDonneeVue('nom','Nom');
        $this->setDonneeVue('prenom','Prénom');
        $this->setDonneeVue('age','Âge');
        $this->setDonneeVue('tarif','Tarif');
        $this->setDonneeVue('valider_informations_billet','VALIDER LES INFORMATIONS DE MON BILLET');

    }
}
