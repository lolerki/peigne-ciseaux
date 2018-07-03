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

        //     if ($carteForm->isSubmitted() && $carteForm->isValid()) {
        // $carteForm->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
        //    $task = $carteForm->getData();
        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
        // $em = $this->getDoctrine()->getManager();
        // $em->persist($task);
        // $em->flush();
        //     return $this->redirectToRoute('task_success');
        //  }

        $infoForm = $this->createForm(InformationsType::class);
        $infoForm->handleRequest($request);

        if ($infoForm->isSubmitted() && $infoForm->isValid()) {

            $task = $infoForm->getData();

            var_dump($task);
            //$em = $this->getDoctrine()->getManager();
            // $em->persist($task);
            // $em->flush();
            //     return $this->redirectToRoute('task_success');
        }

        return $this->render('@App/gestion/gestion.html.twig', [
                    'form' => $carteForm->createView(),
                    'formInfo' => $infoForm->createView()
        ]);
    }

}
