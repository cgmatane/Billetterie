<?php

namespace App\Statics\Views\interfaces\reservation_passagers;

use App\Statics\Views\DonneesVue;

class DonneesVueReservationPassagers extends DonneesVue
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        $this->nomVue = 'reservation_passagers';
        $this->setDonneeVue('renseigner_informations', ['Renseigner vos informations','Fill in your details']);
        $this->setDonneeVue('passager', ['Passager', 'Passenger']);
        $this->setDonneeVue('nom', ['Nom','Name']);
        $this->setDonneeVue('prenom', ['Prénom','First name']);
        $this->setDonneeVue('courriel', ['Courriel','E-mail']);
        $this->setDonneeVue('numero', ['Numéro de téléphone','Phone number']);
        $this->setDonneeVue('immatriculation', ['Numéro d\'immatriculation de votre véhicule','Vehicle registration number']);
        $this->setDonneeVue('marque_vehicule', ['Marque de votre véhicule', 'Vehicle brand']);
        $this->setDonneeVue('couleur_vehicule', ['Couleur de votre véhicule', 'Vehicle color']);
        $this->setDonneeVue('nom_invalide', ['Le nom est invalide','The name is invalid']);
        $this->setDonneeVue('prenom_invalide', ['Le prénom est invalide','The first name is invalid']);
        $this->setDonneeVue('courriel_invalide', ['Le courriel est invalide','The e-mail is invalid']);
        $this->setDonneeVue('numero_invalide', ['Le numéro de téléphone est invalide','The phone number is invalid']);
        $this->setDonneeVue('immatriculation_invalide', ['Le numéro d\'immatriculation est invalide','The vehicle registration number is invalid']);
        $this->setDonneeVue('marque_vehicule_invalide', ['La marque du véhicule est invalide', 'The vehicle brand is invalid']);
        $this->setDonneeVue('couleur_vehicule_invalide', ['La couleur du véhicule est invalide', 'The vehicle color is invalid']);
        $this->setDonneeVue('tel_necessaire', ['(nécessaire en cas d\'annulation ou de retard)','(mandatory in case of annulation or delay)']);
        $this->setDonneeVue('confirmation_animaux',['Je confirme ne pas voyager avec des animaux exotiques','I confirm that I don\'t travel with any exotic pet']);
        $this->setDonneeVue('confirmation_matieres',['Je confirme ne pas transporter de matières dangereuses','I confirm that I don\'t travel with any kind of dangerous materials']);
        $this->setDonneeVue('confirmation_animaux_invalide',['Vous devez confirmer que vous ne voyagez pas avec des animaux exotiques','You have to confirm that you don\'t travel with any exotic pet']);
        $this->setDonneeVue('confirmation_matieres_invalide',['Vous devez confirmer que vous ne transportez pas de matériaux dangereux','You have to confirm that you don\'t travel with any kind of dangerous materials']);
        $this->setDonneeVue('paiement', ['PROCÉDER AU PAIEMENT','PROCEED TO PAYMENT']);
        $this->setDonneeVue('intervalles_age', [['moins de 18 ans', 'entre 18 et 60 ans', 'plus de 60 ans'],['Less than 18 years old', 'Between 18 and 60 years old', 'More than 60 years old']]);
        $this->setDonneeVue('index_intervalle_age_par_defaut', 1);
        $this->setDonneeVue('ajouter_passager', ['Ajouter un passager','Add a passenger']);
        $this->setDonneeVue('retirer_passager', ['Retirer un passager','Remove a passenger']);
        $this->setDonneeVue('infos_matiere_dangereuse_titre', ['Information matières dangereuses','Informations dangerous materials']);
        $this->setDonneeVue('infos_matiere_dangereuse', ['Afin de garantir la sécurité des passagers à bord du traversier,
        il est interdit de transporter des matières dangereuses.','To garanty the security of the passengers abroad, it is strictly forbidden to carry dangerous materials in your vehicle']);
        $this->setDonneeVue('infos_animaux_exotiques_titre', ['Information animaux exotiques','Informations exotic pets']);
        $this->setDonneeVue('infos_animaux_exotiques', ['Afin de garantir la sécurité des passagers à bord du traversier,
        si vous voyagez avec un animal autre que chat ou chien.','To garanty the security of the passengers abroad, you don\'t travel with animals other than cat or dog.']); //TODO wt
        $this->setDonneeVue('titre_page', ['Billetterie - Informations passager','Ticketing - Passenger details']);
    }
}
