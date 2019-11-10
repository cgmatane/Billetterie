<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;
use App\Http\Requests\ReservationPassagerRequest;
use App\Statics\Views\interfaces\reservation_passagers\DonneesVueReservationPassagers;
use App\TypeVehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReservationPassagersController extends PageController
{
    public function __construct() {
        parent::__construct();
        $this->setNomPage('passagers');
        $this->setDonneesStatiques(new DonneesVueReservationPassagers());
    }

    public function gererValidation(Request $requete)
    {
        if ($requete->session()->get('ticket.type_vehicule') == null ) {
            $validatedData = $this->validate($requete, [
                'mail' => 'required|email',
                'numero' => 'required',
                'nom.*' => 'required',
                'prenom.*' => 'required',
                'age.*' => 'required',
            ]);
        }else{
            $validatedData = $this->validate($requete, [
                'mail' => 'required|email',
                'numero' => 'required',
                'nom.*' => 'required',
                'prenom.*' => 'required',
                'age.*' => 'required',
                'immatriculation' => 'required',
            ]);
            $requete->session()->put('ticket.immatriculation', $validatedData['immatriculation']);
        }
        $codeQR = "";
        for($i = 0; $i < 7; $i++){
            $chiffreAleatoire = rand(1,36);
            switch($chiffreAleatoire) {
                case 1:
                    $codeQR .= 'A';
                break;
                case 2:
                    $codeQR .= 'B';
                break;
                case 3:
                    $codeQR .= 'C';
                break;
                case 4:
                    $codeQR .= 'D';
                break;
                case 5:
                    $codeQR .= 'E';
                break;
                case 6:
                    $codeQR .= 'F';
                break;
                case 7:
                    $codeQR .= 'G';
                break;
                case 8:
                    $codeQR .= 'H';
                break;
                case 9:
                    $codeQR .= 'I';
                break;
                case 10:
                    $codeQR .= 'J';
                break;
                case 11:
                    $codeQR .= 'K';
                break;
                case 12:
                    $codeQR .= 'L';
                break;
                case 13:
                    $codeQR .= 'M';
                break;
                case 14:
                    $codeQR .= 'N';
                break;
                case 15:
                    $codeQR .= 'O';
                break;
                case 16:
                    $codeQR .= 'P';
                break;
                case 17:
                    $codeQR .= 'Q';
                break;
                case 18:
                    $codeQR .= 'R';
                break;
                case 19:
                    $codeQR .= 'S';
                break;
                case 20:
                    $codeQR .= 'T';
                break;
                case 21:
                    $codeQR .= 'U';
                break;
                case 22:
                    $codeQR .= 'V';
                break;
                case 23:
                    $codeQR .= 'W';
                break;
                case 24:
                    $codeQR .= 'X';
                break;
                case 25:
                    $codeQR .= 'Y';
                break;
                case 26:
                    $codeQR .= 'Z';
                break;
                case 27:
                    $codeQR .= '1';
                break;
                case 28:
                    $codeQR .= '2';
                break;
                case 29:
                    $codeQR .= '3';
                break;
                case 30:
                    $codeQR .= '4';
                break;
                case 31:
                    $codeQR .= '5';
                break;
                case 32:
                    $codeQR .= '6';
                break;
                case 33:
                    $codeQR .= '7';
                break;
                case 34:
                    $codeQR .= '8';
                break;
                case 35:
                    $codeQR .= '9';
                break;

            }
        }

        $requete->session()->put('ticket.QR', $codeQR);
        $requete->session()->put('ticket.noms', $validatedData['nom']);
        $requete->session()->put('ticket.prenoms', $validatedData['prenom']);
        $requete->session()->put('ticket.ages', $validatedData['age']);

        $requete->session()->put('ticket.mail', $validatedData['mail']);
        $requete->session()->put('ticket.numero', $validatedData['numero']);


        $imageQR = "https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=" . $codeQR;
        $requete->session()->put("ticket.imageQR", $imageQR);


        return redirect(route('validation_informations'));
    }

    protected function setDonneesDynamiques(Request $requete = null)
    {
        switch($requete->session()->get('ticket.type_vehicule')) {
            case TypeVehicule::PIETON:
                $typeVehicule = null;
                break;
            case TypeVehicule::VOITURE:
                $typeVehicule = "Voiture";
                break;
            case TypeVehicule::VOITURE_AVEC_REMORQUE:
                $typeVehicule = "Voiture avec remorque";
                break;
            case TypeVehicule::CAMIONETTE:
                $typeVehicule = "Camionette";
                break;
            case TypeVehicule::POIDS_LOURD:
                $typeVehicule = "Poids lourd";
                break;
            default :
                $typeVehicule = "pas de véhicule";
                break;
        }

        $this->donneesDynamiques = [
            'type_vehicule'=>$typeVehicule,
        ];
    }
}
