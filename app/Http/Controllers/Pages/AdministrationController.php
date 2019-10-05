<?php

namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\administration\DonneesVueAdministration;

class AdministrationController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('administration');
        $this->setDonneesStatiques(new DonneesVueAdministration());
    }
}
