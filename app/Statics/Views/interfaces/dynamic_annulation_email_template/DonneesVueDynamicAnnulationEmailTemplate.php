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
        $this->setDonneeVue('annonce_annulation',['La Société des Traversiers Québec est dans le regret de vous annoncer que la traverse qui devait partir de ', 'The STQ thanks you for your purchase']);
        $this->setDonneeVue('le',['le','on']);
        $this->setDonneeVue('a',['à','at']);
        $this->setDonneeVue('arriver',['et arriver', 'Your trip will take place on']);
        $this->setDonneeVue('explication',['à été annulé et n\'aura donc pas lieu.', 'Download your ticket in the attachment']);
        $this->setDonneeVue('remboursement',['Vous allez être remboursés de la totalité du montant du ticket dans les jours à venir.', 'Don\'t forget to be present in the boarding 15 minutes before the hour displayed on your ticket.']);
        $this->setDonneeVue('comprehension',['Merci de votre compréhension.', 'Don\'t forget to be present in the boarding 15 minutes before the hour displayed on your ticket.']);
    }
}
