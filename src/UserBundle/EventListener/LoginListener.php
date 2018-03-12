<?php

namespace UserBundle\EventListener;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationFailureHandlerInterface;
use FOS\UserBundle\Model\UserManagerInterface;

class LoginListener implements EventSubscriberInterface
{
    protected $userManager;
    
    public function __construct(UserManagerInterface $userManager){
        $this->userManager = $userManager;
    }

    public function getUser() {
        return $this->tokenStorage->getToken()->getUser();
    }

    public static function getSubscribedEvents() {
        return array(
            AuthenticationEvents::AUTHENTICATION_FAILURE => array('onAuthenticationFailure', -10),
            AuthenticationEvents::AUTHENTICATION_SUCCESS => 'onAuhenticationSuccess',
        );
    }

    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event) {
        $token = $event->getAuthenticationToken();
        $request = $event->getRequest();
        $this->onAuthenticationSuccess($request, $token);
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey) {

        if ($request->isXmlHttpRequest()) {
            $array = array('success' => true, 'route' => 'homepage'); // data to return via JSON
            $response = new Response(json_encode($array));
            $response->headers->set('Content-Type', 'application/json');

        } else {
            $response = parent::onAuthenticationSuccess($request, $token);
        }
        return $response;
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception) {


        if ($request->isXmlHttpRequest()) {

            $array = array('success' => false, 'message' => 'Pseudo ou mot de passe incorrect'); // data to return via JSON
            $response = new Response(json_encode($array));
            $response->headers->set('Content-Type', 'application/json');

            return $response;
            
        } else {
            // set authentication exception to session
         //   $request->getSession()->set(SecurityContextInterface::AUTHENTICATION_ERROR, $exception);

            return new RedirectResponse($this->router->generate('login_route'));
        }

        //default redirect operation.
        return $response;
    }
}