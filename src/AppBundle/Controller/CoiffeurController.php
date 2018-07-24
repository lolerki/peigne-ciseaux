<?php
 
namespace AppBundle\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
 
class CoiffeurController extends Controller
{

    /**
     * @Route("/coiffeur/{id}", name="coiffeur")
     * @Method({"GET"})
     */
    public function indexAction($id)
    {

    	$user = $this->getDoctrine()->getRepository('AppBundle:User')->findOneBy(array('id' => $id));
 
    	$card = $this->getDoctrine()->getRepository('AppBundle:Card')->findBy(array('idUser' => $user->getId()));

        return $this->render('AppBundle:Coiffeur:coiffeur.html.twig', [
            'card' => $card,
        ]);

    }

}