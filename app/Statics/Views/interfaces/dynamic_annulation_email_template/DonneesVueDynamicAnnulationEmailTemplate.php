<?php

namespace App\Statics\Views\interfaces\dynamic_annulation_email_template;

use App\Statics\Views\DonneesVue;

class DonneesVueDynamicAnnulationEmailTemplate extends DonneesVue
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        $this->nomVue = 'dynamic_annulation_email_template';
        $this->setDonneeVue('bonjour',['Bonjour', 'Hello']);
        $this->setDonneeVue('annonce_annulation',['La Société des Traversiers Québec est dans le regret de vous annoncer que la traverse qui devait partir de ', 'The STQ is sorry to announce that the ferry that was to leave from']);
        $this->setDonneeVue('le',['le','on']);
        $this->setDonneeVue('a',['à','at']);
        $this->setDonneeVue('arriver',['et arriver', 'and arrives']);
        $this->setDonneeVue('explication',['a été annulé et n\'aura donc pas lieu.', 'has been cancelled and thus won\'t take place.']);
        $this->setDonneeVue('remboursement',['Vous allez être remboursé de la totalité du montant du ticket dans les jours à venir.', 'You will be refunded by the full amount of the ticket in the upcoming days.']);
        $this->setDonneeVue('comprehension',['Merci de votre compréhension.', 'Thank you for your understanding.']);
    }
}
