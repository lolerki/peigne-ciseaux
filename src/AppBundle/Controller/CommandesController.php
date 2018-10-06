<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\Type\RatingType;
use AppBundle\Entity\Note;

class CommandesController extends Controller
{
    /**
     * @Route("/orders", name="orders")
     */
    public function indexAction(Request $request)
    {

        $orderSuccess = false;


        $listRvd = $this->getDoctrine()->getRepository('AppBundle:RendezVous')->findBy(array("idUser" => $this->getUser(), 'valider' => null));

        $listRvdValider = $this->getDoctrine()->getRepository('AppBundle:RendezVous')->findBy(array("idUser" => $this->getUser(), 'valider' => 1));

        $listRvdRefuse = $this->getDoctrine()->getRepository('AppBundle:RendezVous')->findBy(array("idUser" => $this->getUser(), 'valider' => 0));
        
        // replace this example code with whatever you need
        return $this->render('@App/commande/commandes.html.twig', [
            "orderSuccess" => $orderSuccess,
            "rdvs" => $listRvd,
            "rdvvs" => $listRvdValider,
            "rdvrs" => $listRvdRefuse
        ]);
    }

    /**
     * @Route("/rating/{id}/{rdv}", name="rating")
     */
    public function rating(Request $request, $id, $rdv)
    {
        $user = $this->getUser();

        $noteSuccess = false;

        $note = new Note;
        $formRating = $this->createForm(RatingType::class);
        $formRating->handleRequest($request);

        $searchNote = $this->getDoctrine()->getRepository('AppBundle:Note')->findOneBy(array('idRdv' => $rdv));

        if($searchNote == NULL){

            $coiffeur = $this->getDoctrine()->getRepository('AppBundle:User')->findOneBy(array('id' => $id));

            $unRdv = $this->getDoctrine()->getRepository('AppBundle:RendezVous')->findOneBy(array('id' => $rdv));

            if ($formRating->isSubmitted() && $formRating->isValid()) {

               $em = $this->getDoctrine()->getManager();

               $data = $formRating->getData();

               $note->setNote($data['note']);
               $note->setCommentaire($data['commentaire']);
               $note->setIdUser($user);
               $note->setIdCoiffeur($coiffeur);
               $note->setIdRdv($unRdv);

               $em->persist($note);
               $em->flush();

               $rdv = $em->getReference('AppBundle:RendezVous', $rdv);

               $rdv->setNote(1);

               $em->persist($rdv);
               $em->flush($rdv);

               return $this->redirectToRoute('orders');

           }

           return $this->render('@App/commande/rating.html.twig', [
            'formRating' => $formRating->createView(),

        ]);

       } else {

        return $this->redirectToRoute('orders');

    }

    return $this->render('@App/commande/rating.html.twig', [
        'formRating' => $formRating->createView(),

    ]);

}
}
