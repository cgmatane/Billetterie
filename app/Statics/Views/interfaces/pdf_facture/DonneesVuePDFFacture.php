<?php

namespace App\Statics\Views\interfaces\pdf_facture;

use App\Statics\Views\DonneesVue;

class DonneesVuePDFFacture extends DonneesVue
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        $this->nomVue = 'pdf_facture';
        $this->setDonneeVue('adresse_1',['1410, rue de Matane-sur-Mer', '1410, street of Matane-sur-Mer']);
        $this->setDonneeVue('adresse_2','Matane (Québec) G4W 3M6');
        $this->setDonneeVue('facture_numero',['Facture n°', 'Bill n°']);
        $this->setDonneeVue('client',['Client :', 'Client :']);
        $this->setDonneeVue('rappel_transaction',['Rappel de la transaction :', 'Reminder of the transaction :']);
        $this->setDonneeVue('montant',['Montant :', 'Amount :']);
        $this->setDonneeVue('carte',['Carte de crédit :', 'Credit card :']);
        $this->setDonneeVue('titulaire',['Titulaire :', 'Holder :']);
        $this->setDonneeVue('date_heure',['Date/heure :', 'Date/hour :']);
    }
}
