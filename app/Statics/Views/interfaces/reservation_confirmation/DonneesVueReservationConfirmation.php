<?php

namespace App\Statics\Views\interfaces\reservation_confirmation;

use App\Statics\Views\DonneesVue;

class DonneesVueReservationConfirmation extends DonneesVue
{
    public function __construct()
    {
        parent::__construct();
        $this->nomVue = 'reservation_confirmation';
    }
}
