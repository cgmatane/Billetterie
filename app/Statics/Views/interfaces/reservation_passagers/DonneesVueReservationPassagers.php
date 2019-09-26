<?php

namespace App\Statics\Views\interfaces\reservation_passagers;

use App\Statics\Views\DonneesVue;

class DonneesVueReservationPassagers extends DonneesVue
{
    public function __construct()
    {
        parent::__construct();
        $this->nomVue = 'reservation_passagers';
        $this->setDonneeVue('renseigner_informations', 'Renseigner vos informations');
        $this->setDonneeVue('nom', 'Nom');
        $this->setDonneeVue('prenom', 'Prénom');
        $this->setDonneeVue('courriel', 'Courriel');
        $this->setDonneeVue('numero', 'Numéro de téléphone');
        $this->setDonneeVue('tel_necessaire', '(nécessaire en cas d\'annulation ou de retard)');
        $this->setDonneeVue('confirmation_animaux','Je confirme ne pas voyager avec des animaux exotiques');
        $this->setDonneeVue('confirmation_matieres','Je confirme ne pas transporter de matières dangereuses');
        $this->setDonneeVue('paiement', 'Procéder au paiement');
    }
}
