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
        $this->setDonneeVue('date_expiration',["Date d'expiration",'Expiration date']);
        $this->setDonneeVue('envoi_billet', ['Votre billet est en cours d\'envoi...', 'Your ticket is being sent...']);
        $this->setDonneeVue('cvc','CVC');
        $this->setDonneeVue('titre_page', ['Billetterie - Paiement','Ticketing - Payment']);
        $this->setDonneeVue('erreurNumeroCarte', ['Le numero de carte ne contient pas le bon nombre de numéros',
            'The card number does not contain the correct number of numbers']);
        $this->setDonneeVue('erreurTypeCarte', ['La carte n\'est ni une mastercard ni une carte visa',
            'The card is neither a mastercard nor a visa card']);
        $this->setDonneeVue('erreurDateExpirationMois', ['La valeur du mois saisie est inférieure au mois actuel',
            'The value of the month entered is less than the current month']);
        $this->setDonneeVue('erreurDateExpirationAnnee', ['La valeur de l\'année saisie est inférieure à l\'année actuelle',
            'The value of the year entered is less than the current year']);
        $this->setDonneeVue('erreurDateExpirationType', ['Ce champ doit être de la forme : MM / AAAA',
            'This field must be of the form: MM / YYYY']);
        $this->setDonneeVue('erreurCvc', ['Le CVC doit être composé de trois chiffres',
            'CVC must be three digits']);
        $this->setDonneeVue('erreurNom', ['Ce champ doit être composé d\'un nom et d\'un prénom',
            'This field must be composed of a name and a first name']);
    }
}
