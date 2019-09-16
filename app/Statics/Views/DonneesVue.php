<?php


namespace App\Statics\Views;


abstract class DonneesVue
{
    protected $nomVue;
    protected $donneesVue;

    public function __construct() {}

    public function getDonneesVue() {
        /* en PHP l'assignement d'un tableau se fait par copie et non par reference,
            on ne touche donc pas à donneesVue en modifiant donneesVueCleUnique
        */
        $donneesVueCleUnique = $this->donneesVue;
        foreach ($donneesVueCleUnique as $cle=>$valeur) {
            // On remplace chaque clé en ajoutant le préfixe 'nomVue_'
            $donneesVueCleUnique[$this->getCleUnique($cle)] = $donneesVueCleUnique[$cle];
            unset($donneesVueCleUnique[$cle]);
        }
        return $donneesVueCleUnique;
    }

    private function getCleUnique($nomTexteStatique) {
        return $this->nomVue . '_' . $nomTexteStatique;
    }

}
