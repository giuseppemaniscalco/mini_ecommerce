<?php

namespace Purmeo\EshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class SubscribesController extends Controller {

    public function indexAction() {
        $request = $this->getRequest();
        $result = false;

        if ($request->getMethod() == 'POST') {

            $email = $request->request->get('email');
            $event = $request->request->get('event');

            $em = $this->getDoctrine()->getEntityManager();
            $result = $em->getRepository('PurmeoEshopBundle:Subscribes')
                    ->addSubscribe($email, $event);
        }

        $response = new Response();
        $response->setContent(json_encode($result));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

}