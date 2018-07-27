<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CommandesController extends Controller
{
    /**
     * @Route("/orders", name="orders")
     */
    public function indexAction(Request $request)
    {

        dump('coucou');
        
        // replace this example code with whatever you need
        return $this->render('@App/commande/commandes.html.twig', [
        ]);
    }
}
