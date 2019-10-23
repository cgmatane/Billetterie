<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\choix_date\DonneesVueChoixDate;
use Illuminate\Http\Request;

class ChoixDateController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('date');
        $this->setDonneesStatiques(new DonneesVueChoixDate());
    }

    public function gererValidation(Request $requete)
    {
        $jour = $requete->input('date');
        $requete->session()->put('ticket.date', $jour);
        return redirect(route('index'));
    }


    protected function setDonneesDynamiques(Request $requete = null) {
        $this->donneesDynamiques['type_information'] = 'date';
        $this->donneesDynamiques['tab_items'] = [
            "4 Septembre",
            "5 Septembre",
            "6 Septembre",
        ];
    }
}
