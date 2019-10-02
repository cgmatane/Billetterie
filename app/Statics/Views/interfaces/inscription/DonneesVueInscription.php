<?php


namespace App\Statics\Views\interfaces\inscription;


use App\Statics\Views\DonneesVue;

class DonneesVueInscription extends DonneesVue
{
    public function __construct()
    {
        parent::__construct();
        $this->nomVue = 'inscription';
        $this->setDonneeVue('titre', 'S\'inscrire !');
        $this->setDonneeVue('nom_prenom', 'Nom et Prénom');
        $this->setDonneeVue('nom', 'Nom');
        $this->setDonneeVue('prenom', 'Prenom');
        $this->setDonneeVue('courriel', 'Courriel');
        $this->setDonneeVue('mot_passe', 'Mot de passe');
        $this->setDonneeVue('confirme_mot_passe', 'Confirmer mot de passe');
        $this->setDonneeVue('inscription', 'S\'inscrire');
        $this->setDonneeVue('accepter_texte', 'J\'ai lu et j\'accepte les ');
        $this->setDonneeVue('accepter_lien', 'conditions d\'utilisation');


        $this->setDonneeVue('modal_titre', 'Conditions d\'utilisation');
        $this->setDonneeVue('modal_texte', 'Ecrire ici les conditions d\'utilisation');


        $this->setDonneeVue('erreur_nom', 'Nom : seul les lettres, tirets et espaces acceptés');
        $this->setDonneeVue('erreur_prenom', 'Prenom : seul les lettres, tirets et espaces acceptés');
        $this->setDonneeVue('erreur_courriel', 'Email : adresse non valide');
        $this->setDonneeVue('erreur_mot_passe', 'Mot de passe : le mot de passe doit contenir au moins 8 caracteres');
        $this->setDonneeVue('erreur_confirme_mot_passe', 'Confirmation mot de passe : les mots de passe ne sont pas identiques');



    }
}

