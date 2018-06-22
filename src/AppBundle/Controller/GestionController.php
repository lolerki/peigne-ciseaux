<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\Type\CarteType;
use AppBundle\Form\Type\InformationsType;

class GestionController extends Controller {

    /**
     * @Route("/gestion", name="gestion")
     */
    public function indexAction(Request $request) {

        $carteForm = $this->createForm(CarteType::class);
        $carteForm->handleRequest($request);

        $infoForm = $this->createForm(InformationsType::class);
        $infoForm->handleRequest($request);

        // replace this example code with whatever you need
        return $this->render('@App/gestion/gestion.html.twig', [
            'form' => $carteForm->createView(),
            'formInfo' => $infoForm->createView()
        ]);
    }

}
