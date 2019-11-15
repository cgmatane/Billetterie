<?php

namespace App\Statics\Views\interfaces\connexion;

use App\Statics\Views\DonneesVue;

class DonneesVueConnexion extends DonneesVue
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        $this->nomVue = 'connexion';
        $this->setDonneeVue('titre',['Se connecter !','login']);
        $this->setDonneeVue('courriel','Courriel');
        $this->setDonneeVue('mot_passe','Mot de passe');
        $this->setDonneeVue('souvenir','Se souvenir de moi');
        $this->setDonneeVue('connexion','Connexion');
        $this->setDonneeVue('administration','Administration');
    }
}
