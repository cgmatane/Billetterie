<?php

namespace App\Statics\Views\interfaces\reservation_paiement;

use App\Statics\Views\DonneesVue;

class DonneesVueReservationPaiement extends DonneesVue
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        $this->nomVue = 'reservation_paiement';
        $this->setDonneeVue('montant_transaction', ['Montant de la transaction : ', 'Amount of the transaction : ']);
        $this->setDonneeVue('renseigner_informations',['Veuillez renseigner vos informations','Please fill in your details']);
        $this->setDonneeVue('nom_prenom',['Nom et prénom : ','Name and first name : ']);
        $this->setDonneeVue('payer',['JE VALIDE MON PAIEMENT','I CONFIRM MY PAYMENT']);
        $this->setDonneeVue('nom',["Nom tel qu'il est inscrit",'Name as registered']);
        $this->setDonneeVue('numero_carte',["Numéro de carte",'Card number']);
        $this->setDonneeVue('date_expiration',["date d'expiration",'expiration date']);
        $this->setDonneeVue('envoi_billet', ['Votre billet est en cours d\'envoi', 'Your ticket is being sent']);
        $this->setDonneeVue('cvc','CVC');
        $this->setDonneeVue('titre_page', ['Billetterie - Paiement','Ticketing - Payment']);
    }
}
