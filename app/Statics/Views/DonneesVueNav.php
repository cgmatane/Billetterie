<?php

namespace App\Statics\Views;

class DonneesVueNav extends DonneesVue
{
    private $traverse;

    public function __construct()
    {
        parent::__construct();
        $this->nomVue = 'nav';
        $this->donneesVue = [
            'traverse'=>'Matane Côte-Nord',
        ];
    }
}
