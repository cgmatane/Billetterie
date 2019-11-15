<?php

namespace App\Statics\Views;

use Egulias\EmailValidator\Exception\AtextAfterCFWS;
use mysql_xdevapi\Exception;

abstract class DonneesVue
{
    const VALEUR_PAR_DEFAUT = ["TEXTE PAR DEFAUT [!!! A OVERRIDE !!!]","TEXTE PAR DEFAUT [!!! A OVERRIDE !!!]"];
    const FR=0;
    const EN=1;

    protected $nomVue;
    private $donneesVue;

    public function __construct($langue) {
        /*
         * Dans le constructeur on instancie le nom de la vue et le tableau associatif des donnees statiques
         * Le nom de la vue doit être instancié dans la classe de l'interface et non de la page
        */
        $this->nomVue = 'Nom par défaut';
        $this->donneesVue = [];
        $this->langue =$langue;
    }

    public function getDonneesVue() {
        /*
         * en PHP l'assignement d'un tableau se fait par copie et non par reference,
         * on ne touche donc pas à donneesVue en modifiant donneesVueCleUnique
        */
        $donneesVueLanguePrecise=[];
        //dd($this->donneesVue);
            foreach($this->donneesVue as $cle=>$tableauLangue){
                if (is_array($tableauLangue)) {
                    $donneesVueLanguePrecise[$cle] = $tableauLangue[$this->langue];
                }else{
                    $donneesVueLanguePrecise[$cle] = $tableauLangue;
                }
            }

        $this->changerClesDeTableauDonneesEnClesUnique($donneesVueLanguePrecise);

        return $donneesVueLanguePrecise;
    }

    protected function setDonneeVue($cle, $valeur) {
        $this->donneesVue[$cle] = $valeur;
    }

    private function getCleUnique($nomTexteStatique) {
        return $this->nomVue . '_' . $nomTexteStatique;
    }

    private function changerClesDeTableauDonneesEnClesUnique(&$tableauAvecCles) {
        foreach ($tableauAvecCles as $cle=>$valeur) {
            // On remplace chaque clé en ajoutant le préfixe 'nomVue_'
            $tableauAvecCles[$this->getCleUnique($cle)] = $tableauAvecCles[$cle];
            unset($tableauAvecCles[$cle]);
        }
    }
}
