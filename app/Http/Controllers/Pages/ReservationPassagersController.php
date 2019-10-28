<?php


namespace App\Http\Controllers\Pages;


use App\Http\Controllers\PageController;
use App\Http\Requests\ReservationPassagerRequest;
use App\Statics\Views\interfaces\reservation_passagers\DonneesVueReservationPassagers;
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
        $validatedData = $this->validate($requete, [
            'email' => 'required|email',
            'numero' => 'required',
            'nom.*' => 'required',
            'prenom.*' => 'required',
            'age.*' => 'required',
        ]);
        $codeQR = "";
        for($i = 0; $i < 7; $i++){
            $chiffreAleatoire = rand(1,26);
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
            }
        }

        $requete->session()->put('ticket.QR', $codeQR);
        $requete->session()->put('ticket.noms', $validatedData['nom']);
        $requete->session()->put('ticket.prenoms', $validatedData['prenom']);
        $requete->session()->put('ticket.ages', $validatedData['age']);

        $requete->session()->put('ticket.email', $validatedData['email']);
        $requete->session()->put('ticket.numero', $validatedData['numero']);

        return redirect(route('validation_informations'));
    }


}
