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
    private $ticket;

    function gerer(Request $requete)
    {

        $this->creerBillet($requete);
        $this->envoyerPDF($requete);
        $requete->session()->put('commande_terminee',true);
        return redirect(route('index'));
    }

    private function envoyerPDF($requete) {
        /* Création du pdf du billet */
        $donneesPdfBillet = (new ValidationInformationsController())->getDonnees($requete);
        $donneesPdfBillet['imageQR'] = "https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=" . $this->ticket->qrcode;
        $donneesPdfBillet['codeQR'] = $this->ticket->qrcode;
        date_default_timezone_set("America/New_York");
        $donneesPdfBillet['dateEmission'] = date('Y/m/d H:i:s');
        $emplacementPdfBillet = "billets/billet_".$this->ticket->qrcode.".pdf";
        PDF::loadView('pdf_billet', $donneesPdfBillet)->save($emplacementPdfBillet);

        $mail = $requete->session()->get('ticket.mail');
        $noms = $requete->session()->get('ticket.noms');
        $nom = $noms[0];
        $prenoms = $requete->session()->get('ticket.prenoms');
        $prenom = $prenoms[0];
        $tarif = $this->ticket->prix;
        $depart = $requete->session()->get('ticket.depart');
        $arrivee = $requete->session()->get('ticket.arrivee');
        $dateDepart = date('d/m/Y h\hi',strtotime($this->ticket->trajet()->date_depart));;

        /* Création du pdf de la facture */
        $donneesPdfFacture = array(
            'donneesPdfFacture' => array(
                'numeroFacture' => $this->ticket->numero_facture,
                'nomClient' => $nom,
                'prenomClient' => $prenom,
                'montantCommande' => $tarif,
                'numeroCarte' => $requete->session()->get('paiement.carte'),
                'titulaireCarte' => $requete->session()->get('paiement.nom'),
                'datePaiement' =>  $requete->session()->get('paiement.date')
            )
        );

        $emplacementPdfFacture = "factures/facture_".$this->ticket->numero_facture.".pdf";


        // génération du pdf
        PDF::loadView('pdf_facture', $donneesPdfFacture)->save($emplacementPdfFacture);

        $data = array(
            'nom'      => $nom ,
            'prenom'      => $prenom,
            'depart'      => $depart,
            'arrivee'      => $arrivee,
            'date_depart'      => explode(' ',$dateDepart)[0],
            'heure_depart'      => explode(' ',$dateDepart)[1],
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
        $this->ticket = new Ticket();
        $this->ticket->qrcode = Ticket::genererCodeQR();
        $this->ticket->id_trajet = $requete->session()->get('ticket.trajet');
        //On calcule le prix apres avoir insere les passagers et vehicules, parce que la colonne est NOT NULL on ajoute une valeur par defaut
        $this->ticket->prix = 0;
        $this->ticket->date_achat = date('Y-m-d');
        $this->ticket->telephone = $requete->session()->get('ticket.numero');
        $this->ticket->mail = $requete->session()->get('ticket.mail');
        $this->ticket->commentaires = $requete->session()->get('ticket.commentaires');
        $this->ticket->numero_facture = Ticket::genererNumeroFacture();;
        $this->ticket->save();
        for ($i = 0;$i<count($requete->session()->get('ticket.noms'));$i++) {
            $passager = new Passager();
            $passager->nom = $requete->session()->get('ticket.noms')[$i];
            $passager->prenom = $requete->session()->get('ticket.prenoms')[$i];
            $passager->id_intervalle_age = (int)($requete->session()->get('ticket.ages')[$i]);
            $passager->id_ticket = $this->ticket->id_ticket;
            $passager->save();
        }

        if ($requete->session()->get('ticket.type_vehicule') != TypeVehicule::PIETON) {
            $vehicule = new Vehicule();
            $vehicule->type_vehicule = $requete->session()->get('ticket.type_vehicule'); // TODO Synchro constantes TypeVehicule:: avec vrais id de BDD
            $vehicule->couleur = $requete->session()->get('ticket.couleurVehicule');
            $vehicule->immatriculation = $requete->session()->get('ticket.immatriculation');
            $vehicule->marque = $requete->session()->get('ticket.marqueVehicule');
            $vehicule->poids_eleve = $requete->session()->get('ticket.poids_eleve');
            $vehicule->id_ticket = $this->ticket->id_ticket;
            $vehicule->save();
        }

        //On ne peut calculer le prix qu'apres avoir ajouté les passagers et le vehicule
        $this->ticket->prix = $this->ticket->getTarif();
        $this->ticket->save();
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
