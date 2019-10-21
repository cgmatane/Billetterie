<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Pages as Controllers;

use App\Statics\Views\DonneesVueGlobales;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

define('REPERTOIRE_INTERFACES', 'interfaces');

class FrontEndController extends Controller
{

    private $routes;
    private $donneesStatiquesGlobales;

    #public static final $

    public function __construct()
    {

        $this->routes = array(
            'accueil' => array(new Controllers\AccueilController()),
            'choix_liste' => array(
                new Controllers\ChoixDateController(),
                new Controllers\ChoixDepartController()
            ),
            'choix_deux_options' => array(
                new Controllers\ReservationChoixVehiculeController(),
                new Controllers\ReservationChoixRemorqueController(),
                new Controllers\ReservationChoixAutreVehiculeController(),
                new Controllers\ReservationChoixVoitureController(),
                new Controllers\ReservationMatieresController(),
                new Controllers\ReservationPoidsController()
            ),
            'informations' => array(
                new Controllers\InformationsController(),
                new Controllers\InformationsAnimauxController(),
                new Controllers\InformationsMatieresController()
            ),
            'reservation_passagers' => array(new Controllers\ReservationPassagersController()),
            'validation_informations' => array(new Controllers\ValidationInformationsController()),
            'reservation_paiement' => array(new Controllers\ReservationPaiementController()),
            'reservation_confirmation' => array(new Controllers\ReservationConfirmationController()),
            'connexion' => array(new Controllers\ConnexionController()),
            'vue_generale' => array(new Controllers\VueGeneraleController()),
            'administration' => array(new Controllers\AdministrationController(),
                new Controllers\StationController(),
                new Controllers\TrajetController(),
                new Controllers\PlanificationController(),
                new Controllers\NavireController()),
            'requete-qr' => array(new Controllers\RequeteQRController()),
            'pdf-facture' => array(new GenerateurPdfController())
            );

        //Les donnees statiques de vues communes a plusieurs interfaces/pages
        $this->donneesStatiquesGlobales =
            (new DonneesVueGlobales())->getDonneesVue();
    }

    public function manager(Request $requete, $nomRoute = '') {
        if (count($requete->all()) > 0)
            return $this->managerResultatFormulaire($requete, $nomRoute);

        $contexte = $this->getContexteDeNomPage($nomRoute);
        if ($contexte == null)
            return '404';
        $interface = $contexte['interface'];
        $controleur = $contexte['controleur'];

        $id_administrateur = Auth::id();
        if (preg_match('/administration\/(?!connexion)/',$nomRoute) && !isset($id_administrateur)){
            return redirect('/administration/connexion');
        }

        return $this->getVue($requete, $interface, $controleur);
    }

    public function managerResultatFormulaire(Request $requete, $nomRoute = '') {
        $contexte = $this->getContexteDeNomPage($nomRoute);
        if ($contexte == null)
            return '404';
        $controleur = $contexte['controleur'];
        return $controleur->gererValidation($requete);
    }

    private function getVue(Request $requete, $interface, PageController $controleur) {
        $requete->session()->put('derniere_URL', $interface);
        $donneesVue = array_merge($this->donneesStatiquesGlobales, $controleur->getDonnees($requete));
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
