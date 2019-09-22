<?php

namespace App\Statics\Views\interfaces\informations\pages;

use App\Statics\Views\interfaces\informations\DonneesVueInformations;

class DonneesVueInformationsMatieres extends DonneesVueInformations
{
    public function __construct()
    {
        parent::__construct();
        $this->setDonneeVue('titre','Voyagez-vous avec des matières dangereuses ?');
        $this->setDonneeVue('contenu', '<p>Afin de garantir la sécurité des passagers à bord du traversier,
        il est interdit de transporter des matières dangereuses.</p>');
    }
}
