<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProfessionnelController extends Controller
{
    /**
     * @Route("/professionnel", name="professionnel")
     */
    public function indexAction(Request $request)
    {
        
        // replace this example code with whatever you need
        return $this->render('@App/professionnel/professionnel.html.twig', [
        ]);
    }
}
