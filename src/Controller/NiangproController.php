<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\MyClass\Modal;

class NiangproController extends AbstractController
{
    /**
     * @Route("/", name="niangpro")
     */
    public function index(Request $request, \Swift_Mailer $mailer)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();

            // Ici nous enverrons le mail
            $message = (new \Swift_Message('Nouveau contact via mon portfolio'))
                //On attribue l'expediteur 
                ->setFrom($contact['email'])
                // On attribue le destinataire
                ->setTo('NiangProgrammeur@gmail.com')
                // On cree le message avec la vue twig
                ->setBody(
                    $this->renderView('emails/contact.html.twig', compact('contact')),
                    'text/html'
                );
            // On envoie le message
            $mailer->send($message);

            $this->addFlash('message', 'Le message a bien été envoyé');
            $form = $this->createForm(ContactType::class);
        }

        // Les modals
        $modalGrossiste = new Modal("grossiste", "grossiste.png", "Grossiste");
        $modalBiblio = new Modal("biblio", "biblio.png", "Bibliothèque");
        $modalCovid = new Modal("covid", "covid.png", "Covid-19");
        $modalPortfolio = new Modal("portfolio", "portfolio.png", "Mon Portfolio");
        $modalEducatif = new Modal("educatif", "educatif.png", "Réseau éducatif");
        $modalMeme = new Modal("meme", "meme.png", "Générateur de Mémes");
        $modalFilm = new Modal("film", "film.png", "Annuaire de film");
        $modalInvader = new Modal("invader", "invader.png", "Space Invaders");


        return $this->render('niangpro/index.html.twig', [
            'form' => $form->createView(),
            'modal_grossiste' => $modalGrossiste,
            'modal_biblio' => $modalBiblio,
            'modal_covid' => $modalCovid,
            'modal_educatif' => $modalEducatif,
            'modal_meme' => $modalMeme,
            'modal_portfolio' => $modalPortfolio,
            'modal_film' => $modalFilm,
            'modal_invader' => $modalInvader

        ]);
    }
}
