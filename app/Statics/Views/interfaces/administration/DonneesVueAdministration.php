<?php

namespace App\Statics\Views\interfaces\administration;

use App\Statics\Views\DonneesVue;

class DonneesVueAdministration extends DonneesVue
{
    public function __construct()
    {
        parent::__construct();
        $this->nomVue = 'administration';

    }
}
