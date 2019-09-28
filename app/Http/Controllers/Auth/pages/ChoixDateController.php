<?php


namespace App\Http\Controllers\Auth\pages;


use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\choix_liste\pages\DonneesVueChoixDate;
use Illuminate\Http\Request;

class ChoixDateController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('date');
        $this->setDonneesStatiques(new DonneesVueChoixDate());
    }

    protected function setDonneesDynamiques(Request $requete = null) {
        $this->donneesDynamiques['type_information'] = 'jour';
        $this->donneesDynamiques['tab_items'] = [
            ['valeur' => '4',
                'contenu' => '4 Septembre'],
            ['valeur' => '5',
                'contenu' => '5 Septembre'],
            ['valeur' => '6',
                'contenu' => '6 Septembre'],
        ];
    }
}
