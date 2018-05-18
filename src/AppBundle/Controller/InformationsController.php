<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class InformationsController extends Controller
{
    /**
     * @Route("/informations", name="informations")
     */
    public function indexAction(Request $request)
    {

        // replace this example code with whatever you need
        return $this->render('@App/informations/informations.html.twig', [

        ]);
    }
}
