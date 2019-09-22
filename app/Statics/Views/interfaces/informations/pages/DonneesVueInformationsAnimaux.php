<?php

namespace App\Statics\Views\interfaces\informations\pages;

use App\Statics\Views\interfaces\informations\DonneesVueInformations;

class DonneesVueInformationsAnimaux extends DonneesVueInformations
{
    public function __construct()
    {
        parent::__construct();
        $this->setDonneeVue('titre','Voyagez-vous avec des animaux exotiques ?');
        $this->setDonneeVue('contenu', '<p>Afin de garantir la sécurité des passagers à bord du traversier,
        si vous voyagez avec un animal autre que chat ou chien,
        veuillez téléphoner au XXX-XXX-XXXX pour réserver votre traversée.</p>
    <p>Un de nos agents vous répondra le plus rapidement possible.</p>');
    }
}
