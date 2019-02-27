<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\User;

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */
    public function indexAction(Request $request)
    {

        $userList = $this->getDoctrine()->getRepository('AppBundle:User')->findAll();

        $listRvd = $this->getDoctrine()->getRepository('AppBundle:RendezVous')->findAll();
        
        // replace this example code with whatever you need
        return $this->render('@App/admin/admin.html.twig', [
            'users' => $userList,
            'rvds' => $listRvd
        ]);
    }

        /**
     * @Route("/disable/user/{id}", name="disableUser")
    */
    public function desactiverCompte($id){

        $em = $this->getDoctrine()->getManager();

        $userInfo = $this->getDoctrine()->getRepository('AppBundle:User')->findOneBy(array("id" => $id));

        $userUpdate = $em->getReference('AppBundle:User', $id);

        $userUpdate->setEnabled(0);

        $em->persist($userUpdate);
        $em->flush($userUpdate);


        $message = "Vous avez supprimer l'utilisateur '".$userInfo->getFirstName()." ".$userInfo ->getLastName()."' avec succèes ";

        return new Response(json_encode(array('message' => $message, 'result' => 'success')));

    }

    /**
     * @Route("/enabled/user/{id}", name="enabledUser")
    */
    public function activerCompte($id){

        $em = $this->getDoctrine()->getManager();

        $userInfo = $this->getDoctrine()->getRepository('AppBundle:User')->findOneBy(array("id" => $id));

        $user = $em->getReference('AppBundle:User', $id);

        $user->setEnabled(1);

        $em->persist($user);
        $em->flush($user);


        $message = "Vous avez activé l'utilisateur 'userInfo' avec succèes ";

        return new Response(json_encode(array('message' => $message, 'result' => 'success')));

    }
}
