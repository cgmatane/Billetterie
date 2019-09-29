<?php

namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;

use App\Statics\Views\interfaces\connexion\DonneesVueConnexion;
use Illuminate\Http\Request;

class ConnexionController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('connexion');
        $this->setDonneesStatiques(new DonneesVueConnexion());
    }
}
