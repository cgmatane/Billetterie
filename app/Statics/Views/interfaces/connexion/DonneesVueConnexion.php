<?php

namespace App\Statics\Views\interfaces\connexion;

use App\Statics\Views\DonneesVue;

class DonneesVueConnexion extends DonneesVue
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        $this->nomVue = 'connexion';
        $this->setDonneeVue('titre',['Se connecter !','Log in!']);
        $this->setDonneeVue('courriel',['Courriel','E-mail']);
        $this->setDonneeVue('mot_passe',['Mot de passe','Password']);
        $this->setDonneeVue('souvenir',['Se souvenir de moi','Remember me']);
        $this->setDonneeVue('connexion',['Connexion','Log in']);
        $this->setDonneeVue('administration',['Administration','Administration']);
        $this->setDonneeVue('mot_de_passe_oublie', ['Mot de passe oublié ?', 'Forgot your password?']);
    }
}
