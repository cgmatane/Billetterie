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
        $this->setDonneeVue('immatriculation', 'numéro d\'immatriculation de votre véhicule');
        $this->setDonneeVue('tel_necessaire', '(nécessaire en cas d\'annulation ou de retard)');
        $this->setDonneeVue('confirmation_animaux','Je confirme ne pas voyager avec des animaux exotiques');
        $this->setDonneeVue('confirmation_matieres','Je confirme ne pas transporter de matières dangereuses');
        $this->setDonneeVue('paiement', 'PROCÉDER AU PAIEMENT');
        $this->setDonneeVue('intervalles_age', ['moins de 18 ans', 'entre 18 et 60 ans', 'plus de 60 ans']);
        $this->setDonneeVue('index_intervalle_age_par_defaut', 1);
        $this->setDonneeVue('ajouter_passager', 'Ajouter un passager');
        $this->setDonneeVue('retirer_passager', 'Retirer un passager');
        $this->setDonneeVue('infos_matiere_dangereuse_titre', 'Information matières dangereuses');
        $this->setDonneeVue('infos_matiere_dangereuse', 'Afin de garantir la sécurité des passagers à bord du traversier,
        il est interdit de transporter des matières dangereuses.');
        $this->setDonneeVue('infos_animaux_exotiques_titre', 'Information animaux exotiques');
        $this->setDonneeVue('infos_animaux_exotiques', 'AAfin de garantir la sécurité des passagers à bord du traversier,
        si vous voyagez avec un animal autre que chat ou chien.');
    }
}
