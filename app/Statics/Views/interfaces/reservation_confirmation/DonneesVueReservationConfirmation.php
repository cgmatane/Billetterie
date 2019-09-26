<?php

namespace App\Statics\Views\interfaces\reservation_confirmation;

use App\Statics\Views\DonneesVue;

class DonneesVueReservationConfirmation extends DonneesVue
{
    public function __construct()
    {
        parent::__construct();
        $this->nomVue = 'reservation_confirmation';
        $this->setDonneeVue('commande_validee','Commande validée avec succcès !');
        $this->setDonneeVue('billet_email','Vos billets viennent de vous être envoyés par email.');
        $this->setDonneeVue('consulter_billet','Vous pourrez également les consulter depuis cette page ultérieurement.');
        $this->setDonneeVue('rappel_embarquement','N\'oubliez pas de vous présenter à l\'embarquement 15 minutes avant l\'heure inscrite sur vos billets.');
    }
}
