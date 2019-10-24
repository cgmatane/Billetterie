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
        $date = $requete->input('date');
        $tabDate = explode(" ", $date);
        $mois = $tabDate[1];
        switch ($mois) {
            case "Jan":
                $mois = "Janvier";
                break;
            case "Feb":
                $mois = "Fevrier";
                break;
            case "Mar":
                $mois = "Mars";
                break;
            case "Apr":
                $mois = "Avril";
                break;
            case "May":
                $mois = "Mai";
                break;
            case "Jun":
                $mois = "Juin";
                break;
            case "Jul":
                $mois = "Juillet";
                break;
            case "Aug":
                $mois = "Août";
                break;
            case "Sep":
                $mois = "Septembre";
                break;
            case "Oct":
                $mois = "Octobre";
                break;
            case "Nov":
                $mois = "Novembre";
                break;
            case "Dec":
                $mois = "Decembre";
                break;
        }
        $jour = $tabDate[2];
        $dateDepart = $jour.(" ").$mois;
        $requete->session()->put('ticket.date', $dateDepart);
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
