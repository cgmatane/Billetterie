<?php


namespace App\Statics\Views\interfaces\choix_deux_options;

use App\Statics\Views\DonneesVue;

abstract class DonneesVueChoixDeuxOptions extends DonneesVue
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        $this->nomVue = 'choix_deux_options';
        $this->setDonneeVue('question',self::VALEUR_PAR_DEFAUT);
        $this->setDonneeVue('icone1',self::VALEUR_PAR_DEFAUT);
        $this->setDonneeVue('icone2',self::VALEUR_PAR_DEFAUT);
        $this->setDonneeVue('choix1',['OUI',"YES"]);
        $this->setDonneeVue('choix2',['NON',"NO"]);
        $this->setDonneeVue('lien_choix1', self::VALEUR_PAR_DEFAUT);
        $this->setDonneeVue('lien_choix2', self::VALEUR_PAR_DEFAUT);
    }
}
