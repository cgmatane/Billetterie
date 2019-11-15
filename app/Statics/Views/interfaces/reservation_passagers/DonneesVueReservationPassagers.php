<?php

namespace App\Statics\Views\interfaces\reservation_passagers;

use App\Statics\Views\DonneesVue;

class DonneesVueReservationPassagers extends DonneesVue
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        $this->nomVue = 'reservation_passagers';
        $this->setDonneeVue('renseigner_informations', ['Renseigner vos informations','je parle pas anglais']);
        $this->setDonneeVue('nom', ['Nom','je parle pas anglais']);
        $this->setDonneeVue('prenom', ['Prénom','je parle pas anglais']);
        $this->setDonneeVue('courriel', ['Courriel','je parle pas anglais']);
        $this->setDonneeVue('numero', ['Numéro de téléphone','je parle pas anglais']);
        $this->setDonneeVue('immatriculation', ['Numéro d\'immatriculation de votre véhicule','je parle pas anglais']);
        $this->setDonneeVue('marque_vehicule', ['Marque de votre véhicule', 'je parle pas anglais']);
        $this->setDonneeVue('couleur_vehicule', ['Couleur de votre véhicule', 'je parle pas anglais']);
        $this->setDonneeVue('nom_invalide', ['Le nom est invalide','je parle pas anglais']);
        $this->setDonneeVue('prenom_invalide', ['Le prénom est invalide','je parle pas anglais']);
        $this->setDonneeVue('courriel_invalide', ['Le courriel est invalide','je parle pas anglais']);
        $this->setDonneeVue('numero_invalide', ['Le numéro de téléphone est invalide','je parle pas anglais']);
        $this->setDonneeVue('immatriculation_invalide', ['Le numéro d\'immatriculation est invalide','je parle pas anglais']);
        $this->setDonneeVue('marque_vehicule_invalide', ['La marque du véhicule est invalide', 'je parle pas anglais']);
        $this->setDonneeVue('couleur_vehicule_invalide', ['La couleur du véhicule est invalide', 'je parle pas anglais']);
        $this->setDonneeVue('tel_necessaire', ['(nécessaire en cas d\'annulation ou de retard)','je parle pas anglais']);
        $this->setDonneeVue('confirmation_animaux',['Je confirme ne pas voyager avec des animaux exotiques','je parle pas anglais']);
        $this->setDonneeVue('confirmation_matieres',['Je confirme ne pas transporter de matières dangereuses','je parle pas anglais']);
        $this->setDonneeVue('confirmation_animaux_invalide',['Vous devez confirmer que vous ne voyagez pas avec des animaux exotiques','je parle pas anglais']);
        $this->setDonneeVue('confirmation_matieres_invalide',['Vous devez confirmer que vous ne transportez pas de matériaux dangereux','je parle pas anglais']);
        $this->setDonneeVue('paiement', ['PROCÉDER AU PAIEMENT','je parle pas anglais']);
        $this->setDonneeVue('intervalles_age', [['moins de 18 ans', 'entre 18 et 60 ans', 'plus de 60 ans'],['moins de 18 ans', 'entre 18 et 60 ans', 'plus de 60 ans']]);
        $this->setDonneeVue('index_intervalle_age_par_defaut', [1,1]);
        $this->setDonneeVue('ajouter_passager', ['Ajouter un passager','je parle pas anglais']);
        $this->setDonneeVue('retirer_passager', ['Retirer un passager','je parle pas anglais']);
        $this->setDonneeVue('infos_matiere_dangereuse_titre', ['Information matières dangereuses','je parle pas anglais']);
        $this->setDonneeVue('infos_matiere_dangereuse', ['Afin de garantir la sécurité des passagers à bord du traversier,
        il est interdit de transporter des matières dangereuses.','je parle pas anglais']);
        $this->setDonneeVue('infos_animaux_exotiques_titre', ['Information animaux exotiques','je parle pas anglais']);
        $this->setDonneeVue('infos_animaux_exotiques', ['Afin de garantir la sécurité des passagers à bord du traversier,
        si vous voyagez avec un animal autre que chat ou chien.','je parle pas anglais']); //TODO wt
    }
}
