<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Pages as Controllers;

use App\Statics\Views\DonneesVueGlobales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

define('REPERTOIRE_INTERFACES', 'interfaces');


//Format date en francais
setlocale(LC_TIME, "fr");

const FR=0;
const EN=1;


//Timezone pour le Quebec
date_default_timezone_set("America/Toronto");

class FrontEndController extends Controller
{
    public static $langueCourante = FR;
    public static $DONNEES_STATIQUES_GLOBALES;

    private $routes;


    public function __construct()
    {

    }

    public function manager(Request $requete, $nomRoute = '') {
        if ($requete->cookie('langue') != null)
            FrontEndController::$langueCourante = (int)$requete->cookie('langue');

        $this->setControleurs();

        //Les donnees statiques de vues communes a plusieurs interfaces/pages

        FrontEndController::$DONNEES_STATIQUES_GLOBALES = (new DonneesVueGlobales(FrontEndController::$langueCourante))->getDonneesVue();

        if (count($requete->all()) > 0)
            return $this->managerResultatFormulaire($requete, $nomRoute);

        $id_administrateur = Auth::id();
        if (preg_match('/administration\/(?!connexion)/',$nomRoute) && !isset($id_administrateur)){
            return redirect('/administration/connexion');
        }

        $contexte = $this->getContexteDeNomPage($nomRoute);
        if ($contexte == null)
            return '404';
        $interface = $contexte['interface'];
        $controleur = $contexte['controleur'];

        return $this->getVue($requete, $interface, $controleur);
    }

    public function managerResultatFormulaire(Request $requete, $nomRoute = '') {
        $contexte = $this->getContexteDeNomPage($nomRoute);
        if ($contexte == null)
            return '404';
        $controleur = $contexte['controleur'];
        return $controleur->gererValidation($requete);
    }

    private function setControleurs() {
        $this->routes = array(
            'accueil' => array(new Controllers\AccueilController()),
            'choix_depart' => array(new Controllers\ChoixDepartController()),
            'choix_date' => array(new Controllers\ChoixDateController()),
            'choix_deux_options' => array(
                new Controllers\ReservationChoixVehiculeController(),
                new Controllers\ReservationChoixRemorqueController(),
                new Controllers\ReservationChoixAutreVehiculeController(),
                new Controllers\ReservationChoixVoitureController(),
                new Controllers\ReservationMatieresController(),
                new Controllers\ReservationPoidsController()
            ),
            'informations' => array(
                new Controllers\InformationsController()
            ),
            'reservation_passagers' => array(new Controllers\ReservationPassagersController()),
            'validation_informations' => array(new Controllers\ValidationInformationsController()),
            'reservation_paiement' => array(new Controllers\ReservationPaiementController()),
            'connexion' => array(new Controllers\ConnexionController()),
            'vue_generale' => array(new Controllers\VueGeneraleController()),
            'administration' => array(new Controllers\AdministrationController(),
                new Controllers\StationController(),
                new Controllers\TrajetController(),
                new Controllers\TicketController(),
                new Controllers\PassagerController(),
                new Controllers\VehiculeController(),
                new Controllers\NavireController(),
                new Controllers\IntervalleAgeController(),
                new Controllers\TypeVehiculeController()),
            'gardien' => array(new Controllers\GardienController()),
            'requete-qr' => array(new Controllers\RequeteQRController()),
        );
    }

    private function getVue(Request $requete, $interface, PageController $controleur) {
        $requete->session()->put('derniere_URL', $interface);
        $donneesVue = array_merge(FrontEndController::$DONNEES_STATIQUES_GLOBALES, $controleur->getDonnees($requete));
        return view(REPERTOIRE_INTERFACES . '.' . $interface . '.' . $interface, $donneesVue);
    }

    private function getContexteDeNomPage($nomPage) {
        foreach ($this->routes as $interface => $controleurs) {
            foreach ($controleurs as $controleur) {
                if ($nomPage == $controleur->getNomPage()) {
                    return ['interface' => $interface, 'controleur' => $controleur];
                }
            }
        }
        return null;
    }
}
