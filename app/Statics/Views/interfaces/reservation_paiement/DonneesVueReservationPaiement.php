<?php

namespace App\Statics\Views\interfaces\reservation_paiement;

use App\Statics\Views\DonneesVue;

class DonneesVueReservationPaiement extends DonneesVue
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        $this->nomVue = 'reservation_paiement';
        $this->setDonneeVue('renseigner_informations',['Veuillez renseigner vos informations','h']);
        $this->setDonneeVue('nom_prenom',['Nom et prénom : ','h']);
        $this->setDonneeVue('numero_carte',['Numéro de carte : ','h']);
        $this->setDonneeVue('code_securite',['Code de sécurité : ','h']);
        $this->setDonneeVue('payer',['JE VALIDE MON PAIEMENT','h']);
        $this->setDonneeVue('nom',["nom tel qu'il est inscrit",'h']);
        $this->setDonneeVue('numero_carte',["numéro de carte",'h']);
        $this->setDonneeVue('date_expiration',["date d'expiration",'h']);
        $this->setDonneeVue('cvc',["CVC",'h']);
    }
}
