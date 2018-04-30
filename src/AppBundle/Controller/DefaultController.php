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

   //     if ($form->isSubmitted() && $form->isValid()) {
        // $form->getData() holds the submitted values
        // but, the original `$task` variable has also been updated
    //    $task = $form->getData();

        // ... perform some action, such as saving the task to the database
        // for example, if Task is a Doctrine entity, save it!
        // $em = $this->getDoctrine()->getManager();
        // $em->persist($task);
        // $em->flush();

   //     return $this->redirectToRoute('task_success');
  //  }
        
        
        $annonces = $this->getDoctrine()->getRepository('AppBundle:Annonce')->findAll();
        

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'annonces' => $annonces,
            'form' => $rechercheForm->createView(),
        ]);
    }
}
