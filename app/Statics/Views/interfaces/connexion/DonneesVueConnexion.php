<?php

namespace App\Statics\Views\interfaces\connexion;

use App\Statics\Views\DonneesVue;

class DonneesVueConnexion extends DonneesVue
{
    public function __construct()
    {
        parent::__construct();
        $this->nomVue = 'connexion';
        $this->setDonneeVue('titre','Se connecter !');
        $this->setDonneeVue('courriel','Courriel');
        $this->setDonneeVue('mot_passe','Mot de passe');
        $this->setDonneeVue('souvenir','Se souvenir de moi');
        $this->setDonneeVue('connexion','Connexion');
    }
}
