<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\choix_date\DonneesVueChoixDate;
use DateTime;
use Illuminate\Http\Request;

class ChoixDateController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('date');
        $this->setDonneesStatiques(new DonneesVueChoixDate(FrontEndController::$langueCourante));
    }

    public function gererValidation(Request $requete)
    {
        $date = $requete->input('date');
        $tabDate = explode(" ", $date);
        switch ($tabDate[1]) {
            case "Jan":
                $mois = "01";
                break;
            case "Feb":
                $mois = "02";
                break;
            case "Mar":
                $mois = "03";
                break;
            case "Apr":
                $mois = "04";
                break;
            case "May":
                $mois = "05";
                break;
            case "Jun":
                $mois = "06";
                break;
            case "Jul":
                $mois = "07";
                break;
            case "Aug":
                $mois = "08";
                break;
            case "Sep":
                $mois = "09";
                break;
            case "Oct":
                $mois = "10";
                break;
            case "Nov":
                $mois = "11";
                break;
            case "Dec":
                $mois = "12";
                break;
            default:
                return redirect(route('choix_date'));
                break;
        }
        $jour = $tabDate[2];
        $annee = $tabDate[3];

        $dateCommandeString = $jour.("-").$mois.("-").$annee;
        try {
            $dateCommande = new DateTime($dateCommandeString);
        } catch (\Exception $e) {}
        $dateDuJour = new DateTime("now");
        $interval = date_diff($dateDuJour , $dateCommande);

        if ($interval->format('%a')>90){
            return redirect(route('choix_date'));
        }

        $requete->session()->put('ticket.date', $dateCommandeString);
        return redirect(route('index'));
    }


    protected function setDonneesDynamiques(Request $requete = null) {
        $this->donneesDynamiques['type_information'] = 'date';
    }
}
