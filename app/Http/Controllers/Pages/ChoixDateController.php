<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;
use App\Statics\Views\interfaces\choix_date\DonneesVueChoixDate;
use DateTime;
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
        $moisCommande = "01";
        switch ($mois) {
            case "Jan":
                $mois = "Janvier";
                $moisCommande = "01";
                break;
            case "Feb":
                $mois = "Fevrier";
                $moisCommande = "02";
                break;
            case "Mar":
                $mois = "Mars";
                $moisCommande = "03";
                break;
            case "Apr":
                $mois = "Avril";
                $moisCommande = "04";
                break;
            case "May":
                $mois = "Mai";
                $moisCommande = "05";
                break;
            case "Jun":
                $mois = "Juin";
                $moisCommande = "06";
                break;
            case "Jul":
                $mois = "Juillet";
                $moisCommande = "07";
                break;
            case "Aug":
                $mois = "Août";
                $moisCommande = "08";
                break;
            case "Sep":
                $mois = "Septembre";
                $moisCommande = "09";
                break;
            case "Oct":
                $mois = "Octobre";
                $moisCommande = "10";
                break;
            case "Nov":
                $mois = "Novembre";
                $moisCommande = "11";
                break;
            case "Dec":
                $mois = "Decembre";
                $moisCommande = "12";
                break;
        }
        $jour = $tabDate[2];
        $annee = $tabDate[3];

        $dateCommandeString = $annee.("-").$moisCommande.("-").$jour;
        try {
            $dateCommande = new DateTime($dateCommandeString);
        } catch (\Exception $e) {
        }
        $dateDuJour = new DateTime("now");
        $interval = date_diff($dateDuJour , $dateCommande);

        if ($interval->format('%a')>90){
            return redirect(route('choix_date'));
        }

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
