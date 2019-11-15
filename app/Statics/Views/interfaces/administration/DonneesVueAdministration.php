<?php

namespace App\Statics\Views\interfaces\administration;

use App\Statics\Views\DonneesVue;

class DonneesVueAdministration extends DonneesVue
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        $this->nomVue = 'administration';


    }
}
