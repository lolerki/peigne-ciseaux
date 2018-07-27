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
    public function indexAction($id, Request $request)
    {

        //formulaire de commande
        $orderForm = $this->createForm(OrderType::class);

        $orderForm->handleRequest($request);

    	$user = $this->getDoctrine()->getRepository('AppBundle:User')->findOneBy(array('id' => $id));

    	$cardMens = $this->getDoctrine()->getRepository('AppBundle:Card')->findBy(array('idUser' => $user->getId(), 'category' => 'homme'));

        $cardWomens = $this->getDoctrine()->getRepository('AppBundle:Card')->findBy(array('idUser' => $user->getId(), 'category' => 'femme'));

        $cardsChild = $this->getDoctrine()->getRepository('AppBundle:Card')->findBy(array('idUser' => $user->getId(), 'category' => 'enfant'));


        if ($orderForm->isSubmitted() && $orderForm->isValid()) {

            $data = $orderForm->getData();


        //    $data['date']->format('d-m-y');

          //  $data['heure']->format('H:i:s');


            $em = $this->getDoctrine()->getManager();
            $user = $this->getUser();

            $coiffeurObjet = $this->getDoctrine()->getRepository('AppBundle:User')->find(array('id' => $id));




            $cardObjet = $this->getDoctrine()->getRepository('AppBundle:Card')->find(array('id' => $data['idcard']));
          //  dump($cardObjet->getIdUser());


            $order = new RendezVous();

          //  $order->setDate($data['date']->format('d-m-y'));
         //   $order->setHeure($data['heure']->format('H:i:s'));

            $order->setDate($data['date']);
            $order->setHeure($data['heure']);
            $order->setIdUser($user);
            $order->setIdCoiffeur($coiffeurObjet);
            $order->setIdCard($cardObjet);

            $em->persist($order);
            $em->flush();

            $orderSuccess = true;

            return $this->render('AppBundle:Commande:commandes.html.twig', [
                'orderSuccess' => $orderSuccess,
            ]);

        }

        return $this->render('AppBundle:Coiffeur:coiffeur.html.twig', [
            'formOrder' => $orderForm->createView(),
            'cardsMens' => $cardMens,
            'cardsWomens' => $cardWomens,
            'cardsChild' => $cardsChild,
        ]);

    }

}