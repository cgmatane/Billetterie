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
        $this->setDonneeVue('courriel',['Courriel','h']);
        $this->setDonneeVue('mot_passe',['Mot de passe','h']);
        $this->setDonneeVue('souvenir',['Se souvenir de moi','h']);
        $this->setDonneeVue('connexion',['Connexion','h']);
        $this->setDonneeVue('administration',['Administration','h']);
    }
}
