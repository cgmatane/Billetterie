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
            'administration' => array(new Controllers\AdministrationController()),
            'inscription' => array(new Controllers\InscriptionController()),
            //'requete-qr' => array(new Controllers\RequeteQRController()),
            //'pdf' => array(new Controllers\PdfController()),
            //'pdf-facture' => array(new GenerateurPdfController())
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

    public function verifyLogin(Request $request){
        $messages = [
            'email.required' => 'Le champ courriel n\'est pas rempli' ,
            'email.email' => 'Le courriel n\'est pas valide' ,
            'password.required' => 'Le champ mot de passe n\'est pas rempli' ,
            'password.min' => 'Le champ mot de passe doit faire au minimum 3 caractères' ,
        ];
        $this->validate($request,[
            'email' =>  'required|email',
            'password'  => 'required|min:3'
        ],$messages);

        $user_data = array(
            'email' => htmlentities($request->get('email')),
            'password'  => htmlentities($request->get('password'))
        );

        if (Auth::attempt($user_data)){
            return redirect('/administration');
        }else{
            return back()->with('error','Les identifiants sont incorrect');
        }
    }

    public function recuperationInfoPassager(Request $request){
        $messages = [
            'nom.required' => 'Le champ nom n\'est pas rempli' ,
            'prenom.required' => 'Le champ prenom n\'est pas rempli' ,
            'email.email' => 'Le courriel n\'est pas valide' ,
            'email.required' => 'Le champ email n\'est pas rempli' ,
        ];
        $this->validate($request,[
            'email' =>  'required|email',
            'nom.*' => 'required',
            'nom.0' => 'nullable',
            'prenom.*' => 'required',
            'prenom.0' => 'nullable',
            'age.*' => 'required',
            'age.0' => 'nullable',
        ],$messages);

    $info_passager = array(
        'nom' => $request->get('nom'),
        'prenom' => $request->get('prenom'),
        'age' => $request->get('age'),
        'email' => $request->get('email'),
        'numero' => $request->get('numero'),
    );
    return redirect('/validation')->with('info_passager',$info_passager);
}

}
