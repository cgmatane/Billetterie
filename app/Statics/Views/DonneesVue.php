<?php

namespace App\Statics\Views;

abstract class DonneesVue
{
    const VALEUR_PAR_DEFAUT = "TEXTE PAR DEFAUT [!!! A OVERRIDE !!!]";

    protected $nomVue;
    private $donneesVue;

    public function __construct() {
        /*
         * Dans le constructeur on instancie le nom de la vue et le tableau associatif des donnees statiques
         * Le nom de la vue doit être instancié dans la classe de l'interface et non de la page
        */
        $this->nomVue = 'Nom par défaut';
        $this->donneesVue = [];
    }

    public function getDonneesVue() {
        /*
         * en PHP l'assignement d'un tableau se fait par copie et non par reference,
         * on ne touche donc pas à donneesVue en modifiant donneesVueCleUnique
        */
        $donneesVueCleUnique = $this->donneesVue;
        $this->changerClesDeTableauDonneesEnClesUnique($donneesVueCleUnique);

        return $donneesVueCleUnique;
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
