<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\Type\InformationClientType;
use AppBundle\Entity\User;

class InformationsController extends Controller
{
    /**
     * @Route("/informations", name="informations")
     */
    public function indexAction(Request $request)
    {

    	$user = $this->getUser();

    	$infoFormClient = $this->createForm(InformationClientType::class, $user);
    	$infoFormClient->handleRequest($request);


    	if ($infoFormClient->isSubmitted() && $infoFormClient->isValid()) {

    		$data = $infoFormClient->getData();

    	}

        // replace this example code with whatever you need
    	return $this->render('@App/informations/informations.html.twig', [
    		'formInfoClient' => $infoFormClient->createView(),
    	]);
    }
}
