<?php

namespace App\Statics\Views\interfaces\informations\pages;

use App\Statics\Views\interfaces\informations\DonneesVueInformations;

class DonneesVueInformationsGenerales extends DonneesVueInformations
{
    public function __construct($langue)
    {
        parent::__construct($langue);
        $this->setDonneeVue('titre', ['Informations', 'Informations']);
        $this->setDonneeVue('a_savoir', ['À savoir avant de partir : ', 'What your need to know before departure : ']);
        $this->setDonneeVue('conditions_climatiques', ['Que ce passe-t-il en cas d\'annulation de mon trajet ?', 'What happens if my trip is canceled ?']);
        $this->setDonneeVue('traverses_annulees', ['Elles peuvent donc êtres annulées à tout moment', 'This means they can be cancelled any time']);
        $this->setDonneeVue('cas_annulation', ['En cas d\'annulation, ne vous inquiétez pas vous receverez un email immédiatement et vous serez remboursé automatiquement !','In case of cancellation, dont worry you will receive an email and you will be refund automatically!']);
        $this->setDonneeVue('question_embarquement', ['Que doit-on présenter lors de l\'embarquement si nous avons réservé par Internet ? ', 'What must be presented when boarding if we booked via the Internet ?']);
        $this->setDonneeVue('reponse_embarquement', ['Vous devez présenter au préposé votre copie de facture, qui vous a été envoyée dans votre courriel', 'You must present to the agent your invoice copy, which was sent to you in your email']);
        $this->setDonneeVue('question_remboursement', ['J\'ai fait une réservation pour la traverse de Matane et je ne pourrai pas m\'y présenter. Est-ce que l\'acompte que j\'ai payé me sera remboursé ?', 'I made a reservation for the Matane ferry and I will not be able to attend. Will the down payment I paid be refunded ?']);
        $this->setDonneeVue('reponse_remboursement', ['Oui, seulement si l\'annulation est faite avant 15 h la veille de votre départ. Passé ce délai, l\'acompte ne sera pas remboursé.', 'Yes, only if the cancellation is made before 3 pm the day before your departure. After this period, the deposit will not be refunded.']);
        //$this->setDonneeVue('question_remboursement', ['', '']);
        $this->setDonneeVue('question_contact', ['Comment puis-je joindre la STQ ?', 'How can I contact STQ ?']);
        $this->setDonneeVue('reponse_contact', ['En cas de problème, vous pouvez joindre la STQ par mail à l\'adresse kirk@gmail.com', 'In case of problem, you can reach the STQ by email at kirk@gmail.com']);
        $this->setDonneeVue('presentation_embarquement', ['Vous devez vous présenter à l\'embarquement 15 minutes avant l\'heure de départ','You have to get aboard 15 minutes before the hour of departure']);
        $this->setDonneeVue('titre_page', ['Billetterie - Informations','Ticketing - Informations']);
    }
}
