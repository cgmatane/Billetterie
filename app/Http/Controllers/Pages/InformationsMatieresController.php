<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\informations\pages\DonneesVueInformationsMatieres;

class InformationsMatieresController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('infos_matieres');
        $this->setDonneesStatiques(new DonneesVueInformationsMatieres(0));
    }
}
