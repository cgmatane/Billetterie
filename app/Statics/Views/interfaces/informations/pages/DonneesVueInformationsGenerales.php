<?php

namespace App\Statics\Views\interfaces\informations\pages;

use App\Statics\Views\interfaces\informations\DonneesVueInformations;

class DonneesVueInformationsGenerales extends DonneesVueInformations
{
    public function __construct()
    {
        parent::__construct();
        $this->setDonneeVue('titre', 'Informations');
        //Solution temporaire : la statique contient du code HTML car la disposition du texte entre les templates informations est differente
        $this->setDonneeVue('contenu', '<h2> À savoir avant de partir :</h2>
            <ul>
                <li class="font-weight-bold">Les traverses sont soumises aux conditions climatiques :</li>
                <p>Elles peuvent donc êtres annulées à tout moment <br>
                    En cas d\'annulation, ne vous inquiétez pas vous serez remboursé automatiquement !
                    Plus d\'infos sur le site de <a href="https://meteo.gc.ca/city/pages/qc-15_metric_f.html">Québec météo</a></p>
                <li class="font-weight-bold"> Vous devez vous présenter à l\'embarquement 15 min avant l\'heure de départ</li>
            </ul>');
    }
}
