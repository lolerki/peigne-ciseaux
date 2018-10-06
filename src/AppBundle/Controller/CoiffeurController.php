<?php

namespace AppBundle\Controller;

use AppBundle\Entity\RendezVous;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Form\Type\OrderType;

class CoiffeurController extends Controller
{

    /**
     * @Route("/coiffeur/{id}", name="coiffeur")
     */
    public function indexAction(Request $request, $id)
    {
        $orderSuccess = false;
        $total = false;

        //formulaire de commande
        $orderForm = $this->createForm(OrderType::class);

        $orderForm->handleRequest($request);

        $user = $this->getDoctrine()->getRepository('AppBundle:User')->findOneBy(array('id' => $id));

        $cardMens = $this->getDoctrine()->getRepository('AppBundle:Card')->findBy(array('idUser' => $user->getId(), 'category' => 'homme'));

        $cardWomens = $this->getDoctrine()->getRepository('AppBundle:Card')->findBy(array('idUser' => $user->getId(), 'category' => 'femme'));

        $cardsChild = $this->getDoctrine()->getRepository('AppBundle:Card')->findBy(array('idUser' => $user->getId(), 'category' => 'enfant'));

        $listNotes = $this->getDoctrine()->getRepository('AppBundle:Note')->findBy(array("idCoiffeur" => $id));

        $i = 0;
        foreach ($listNotes as $uneNote) {

            $i++;

            $note = $uneNote->getNote();

            $total += $note;

        }

        if($total == false){

            $moyenne = 0;

        } else {

            $moyenne = $total / $i;

        }

        if ($orderForm->isSubmitted() && $orderForm->isValid()) {

            $data = $orderForm->getData();

            $em = $this->getDoctrine()->getManager();
            $user = $this->getUser();

            $coiffeurObjet = $this->getDoctrine()->getRepository('AppBundle:User')->find(array('id' => $id));

            $cardObjet = $this->getDoctrine()->getRepository('AppBundle:Card')->find(array('id' => $data['idcard']));


            $order = new RendezVous();

            $order->setDate($data['date']);
            $order->setHeure($data['heure']);
            $order->setIdUser($user);
            $order->setIdCoiffeur($coiffeurObjet);
            $order->setIdCard($cardObjet);

            $em->persist($order);
            $em->flush();

            $orderSuccess = true;

            $listRvd = $this->getDoctrine()->getRepository('AppBundle:RendezVous')->findBy(array("idUser" => $this->getUser(), 'valider' => 0));

            $listRvdValider = $this->getDoctrine()->getRepository('AppBundle:RendezVous')->findBy(array("idUser" => $this->getUser(), 'valider' => 1));

            $listRvdRefuse = $this->getDoctrine()->getRepository('AppBundle:RendezVous')->findBy(array("idUser" => $this->getUser(), 'valider' => 0));



            return $this->render('AppBundle:Commande:commandes.html.twig', [
                'orderSuccess' => $orderSuccess,
                'rdvs' => $listRvd,
                'rdvvs' => $listRvdValider,
                'rdvrs' => $listRvdRefuse
            ]);

        }

        return $this->render('AppBundle:Coiffeur:coiffeur.html.twig', [
            'formOrder' => $orderForm->createView(),
            'cardsMens' => $cardMens,
            'cardsWomens' => $cardWomens,
            'cardsChild' => $cardsChild,
            'moyenne' => $moyenne
        ]);

    }

}