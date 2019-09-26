<?php

namespace App\Statics\Views\interfaces\reservation_paiement;

use App\Statics\Views\DonneesVue;

class DonneesVueReservationPaiement extends DonneesVue
{
    public function __construct()
    {
        parent::__construct();
        $this->nomVue = 'reservation_paiement';
        $this->setDonneeVue('renseigner_informations','Renseignez vos informations de paiement');
        $this->setDonneeVue('nom_prenom','Nom et prénom : ');
        $this->setDonneeVue('numero_carte','Numéro de carte : ');
        $this->setDonneeVue('code_securite','Code de sécurité : ');
        $this->setDonneeVue('payer','Payer');

    }
}
