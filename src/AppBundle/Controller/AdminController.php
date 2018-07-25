<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */
    public function indexAction(Request $request)
    {

        $userList = $this->getDoctrine()->getRepository('AppBundle:User')->findAll();
        
        // replace this example code with whatever you need
        return $this->render('@App/admin/admin.html.twig', [
            'users' => $userList,
        ]);
    }
}
