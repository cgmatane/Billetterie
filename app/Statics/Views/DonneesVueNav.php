<?php

namespace App\Statics\Views;

class DonneesVueNav extends DonneesVue
{
    private $traverse = "Matane Côte-Nord";

    public function getDonneesVue() {
        return ['traverse' => $this->traverse];
    }
}
