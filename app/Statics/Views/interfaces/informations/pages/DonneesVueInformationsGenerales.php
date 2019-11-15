<?php

namespace App\Statics\Views\interfaces\informations\pages;

use App\Statics\Views\interfaces\informations\DonneesVueInformations;

class DonneesVueInformationsGenerales extends DonneesVueInformations
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        $this->setDonneeVue('titre', 'Informations');
        $this->setDonneeVue('a_savoir', ['À savoir avant de partir : ', 'h']);
        $this->setDonneeVue('conditions_climatiques', ['Les traverses sont soumises aux conditions climatiques :', 'h']);
        $this->setDonneeVue('traverses_annulees', ['Elles peuvent donc êtres annulées à tout moment', 'h']);
        $this->setDonneeVue('cas_annulation', ['En cas d\'annulation, ne vous inquiétez pas vous serez remboursé automatiquement !','h']);
        $this->setDonneeVue('plus_dinfos', ['Plus d\'infos sur le site de ', 'h']);
        $this->setDonneeVue('quebec_meteo', ['Québec météo','h']);
        $this->setDonneeVue('presentation_embarquement', ['Vous devez vous présenter à l\'embarquement 15 minutes avant l\'heure de départ','h']);
        //Solution temporaire : la statique contient du code HTML car la disposition du texte entre les templates informations est differente

        /*
        $this->setDonneeVue('contenu', '<h3> {{ $informations_a_savoir }}</h3>
            <ul>
                <li> <p class="font-weight-bold">{{ $informations_conditions_climatiques }}</p><p>{{ $informations_traverses_annulees }}<br>
                    {{ $informations_cas_annulation }}
                    {{ $informations_plus_dinfos }}<a href="https://meteo.gc.ca/city/pages/qc-15_metric_f.html">{{ $informations_quebec_meteo }}</a></p></li>

                <li><p class="font-weight-bold">{{ $informations_presentation_embarquement }}</p></li>
            </ul>');
        */
    }
}
