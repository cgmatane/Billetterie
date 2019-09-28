<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\accueil\DonneesVueAccueil;

class AccueilController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('accueil');
        $this->setDonneesStatiques(new DonneesVueAccueil());
    }
}
