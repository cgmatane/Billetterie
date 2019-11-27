<?php


namespace App\Statics\Views\interfaces\gardien;


use App\Statics\Views\DonneesVue;

class DonneesVueGardien extends DonneesVue
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        $this->nomVue = 'gardien';
        $this->setDonneeVue('titre',['Interface du gardien', 'Page for the guardian']);
        
    }
}