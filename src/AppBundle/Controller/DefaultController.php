<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\Type\RechercheType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        //formulaire recherche
        $rechercheForm = $this->createForm(RechercheType::class);
        $rechercheForm->handleRequest($request);

        

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'form' => $rechercheForm->createView(),
        ]);
    }
}
