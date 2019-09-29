<?php

namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;


use App\Statics\Views\interfaces\inscription\DonneesVueInscription;
use Illuminate\Http\Request;

class InscriptionController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('inscription');
        $this->setDonneesStatiques(new DonneesVueInscription());
    }
}
