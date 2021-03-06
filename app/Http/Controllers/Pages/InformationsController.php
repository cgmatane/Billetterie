<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\informations\pages\DonneesVueInformationsGenerales;

class InformationsController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('infos');
        $this->setDonneesStatiques(new DonneesVueInformationsGenerales(FrontEndController::$langueCourante));
    }
}
