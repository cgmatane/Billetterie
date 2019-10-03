<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\informations\pages\DonneesVueInformationsGenerales;

class ValidationInformationsController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('validation');
        $this->setDonneesStatiques(new DonneesVueInformationsGenerales());
    }
}
