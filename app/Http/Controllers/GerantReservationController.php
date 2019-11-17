<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Pages\ValidationInformationsController;
use App\Mail\SendMail;
use App\Ticket;
use App\Passager;
use App\TypeVehicule;
use App\Vehicule;
use MongoDB\BSON\Type;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class GerantReservationController extends Controller
{
    private $codeQR;

    function gerer(Request $requete)
    {
        $this->codeQR = Ticket::genererCodeQR();
        $this->envoyerPDF($requete);
        $this->creerBillet($requete);
        $requete->session()->put('commande_terminee',true);
        return redirect(route('index'));
    }

    private function envoyerPDF($requete) {
        /* Création du pdf du billet */
        $donneesPdfBillet = (new ValidationInformationsController())->getDonnees($requete);
        $donneesPdfBillet['imageQR'] = "https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=" . $this->codeQR;
        $donneesPdfBillet['codeQR'] = $this->codeQR;
        date_default_timezone_set("America/New_York");
        $donneesPdfBillet['dateEmission'] = date('Y/m/d H:i:s');
        $emplacementPdfBillet = "billets/billet_".$this->codeQR.".pdf";
        PDF::loadView('pdf_billet', $donneesPdfBillet)->save($emplacementPdfBillet);

        $mail = $requete->session()->get('ticket.mail');
        $noms = $requete->session()->get('ticket.noms');
        $nom = $noms[0];
        $prenoms = $requete->session()->get('ticket.prenoms');
        $prenom = $prenoms[0];
        $date = $requete->session()->get('ticket.date');
        $heure = $requete->session()->get('ticket.heure');
        $depart = $requete->session()->get('ticket.depart');
        $arrivee = $requete->session()->get('ticket.arrivee');

        /* Création du pdf de la facture */
        $donneesPdfFacture = array(
            'donneesPdfFacture' => array(
                'nomClient' => $nom,
                'prenomClient' => $prenom,
                'montantCommande' => 45,
                'numeroCarte' => $requete->session()->get('paiement.carte'),
                'titulaireCarte' => $requete->session()->get('paiement.nom'),
                'datePaiement' =>  $requete->session()->get('paiement.date')
            )
        );

        $emplacementPdfFacture = "factures/facture_".$this->codeQR.".pdf";


        // génération du pdf
        PDF::loadView('pdf_facture', $donneesPdfFacture)->save($emplacementPdfFacture);

        $data = array(
            'nom'      => $nom ,
            'prenom'      => $prenom,
            'date'      => $date,
            'heure'      => $heure,
            'depart'      => $depart,
            'arrivee'      => $arrivee,
            'emplacementPdfBillet'      => $emplacementPdfBillet,
            'emplacementPdfFacture'      => $emplacementPdfFacture
            //'message'   =>   $request->message
        );
        Mail::to($mail)->send(new SendMail($data));

        /* Suppression des pdf */
        $this->supprimerPDF($emplacementPdfBillet);
        $this->supprimerPDF($emplacementPdfFacture);
    }

    private function creerBillet($requete) {
        $ticket = new Ticket();
        $ticket->qrcode = $this->codeQR;
        $ticket->id_trajet = $requete->session()->get('ticket.trajet');
        $ticket->prix = 55; // TODO gerer prix
        $ticket->date_achat = date('Y-m-d');
        $ticket->nombre_bagage = 0; // TODO gerer nombre bagages
        $ticket->nombre_animal = 0; // TODO gerer nombre animaux (a priori supprimer la colonne)
        $ticket->telephone = $requete->session()->get('ticket.numero');
        $ticket->mail = $requete->session()->get('ticket.mail');
        $ticket->save();
        for ($i = 0;$i<count($requete->session()->get('ticket.noms'));$i++) {
            $passager = new Passager();
            $passager->nom = $requete->session()->get('ticket.noms')[$i];
            $passager->prenom = $requete->session()->get('ticket.prenoms')[$i];
            $passager->date_naissance = date('Y-m-d'); // TODO remplacer par intervalle naissance
            $passager->id_ticket = $ticket->id_ticket;
            $passager->save();
        }

        if ($requete->session()->get('ticket.type_vehicule') != TypeVehicule::PIETON) {
            $vehicule = new Vehicule();
            $vehicule->type_vehicule = $requete->session()->get('ticket.type_vehicule'); // TODO Synchro constantes TypeVehicule:: avec vrais id de BDD
            $vehicule->couleur = $requete->session()->get('ticket.couleurVehicule');
            $vehicule->immatriculation = $requete->session()->get('ticket.immatriculation');
            $vehicule->modele = "206"; //TODO retirer ?
            $vehicule->marque = $requete->session()->get('ticket.marqueVehicule');
            $vehicule->id_ticket = $ticket->id_ticket;
            $vehicule->save();
        }
    }


    /**
     * @param string $emplacementPDF
     */
    private function supprimerPDF(string $emplacementPDF): void
    {
        if (file_exists($emplacementPDF)) {
            unlink($emplacementPDF);
        }
    }
}
