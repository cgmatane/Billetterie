<?php


namespace App\Http\Controllers\Auth\pages;


use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\informations\pages\DonneesVueInformationsAnimaux;

class InformationsAnimauxController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('infos_animaux');
        $this->setDonneesStatiques(new DonneesVueInformationsAnimaux());
    }
}
