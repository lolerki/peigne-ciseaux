<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CommandesController extends Controller
{
    /**
     * @Route("/commandes", name="commandes")
     */
    public function indexAction(Request $request)
    {
        
        // replace this example code with whatever you need
        return $this->render('@App/commande/commandes.html.twig', [
        ]);
    }
}
