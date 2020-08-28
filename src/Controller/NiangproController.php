<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Modal;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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

        // LES OBJETS MODAL
        $biblio = new Modal("biblio", "Bibliothèque");
        $modalGrossiste = new Modal("grossiste", "Grossiste");
        $modalCovid = new Modal("covid", "Covid-19");
        $modalPortfolio = new Modal("portfolio", "Mon Portfolio");
        $modalEducatif = new Modal("educatif", "Réseau éducatif");
        $modalMeme = new Modal("meme", "Générateur de Mémes");
        $modalFilm = new Modal("film", "Annuaire de film");
        $modalInvader = new Modal("invader", "Space Invaders");


        return $this->render('niangpro/index.html.twig', [
            'form' => $form->createView(),
            'biblio' => $biblio,
            'grossiste' => $modalGrossiste,
            'covid' => $modalCovid,
            'educatif' => $modalEducatif,
            'meme' => $modalMeme,
            'portfolio' => $modalPortfolio,
            'film' => $modalFilm,
            'invader' => $modalInvader
        ]);
    }
}
