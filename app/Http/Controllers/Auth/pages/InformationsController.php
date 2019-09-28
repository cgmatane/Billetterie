<?php


namespace App\Http\Controllers\Auth\pages;


use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\informations\pages\DonneesVueInformationsGenerales;

class InformationsController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('infos');
        $this->setDonneesStatiques(new DonneesVueInformationsGenerales());
    }
}
