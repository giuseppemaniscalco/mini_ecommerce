<?php

namespace Purmeo\EshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Purmeo\EshopBundle\Form\RegisterType;
use Purmeo\EshopBundle\Entity\Register;
use JMS\SecurityExtraBundle\Annotation\Secure;

class UserController extends Controller {

    public function loginAction() {
        if ($this->get('request')->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $this->get('request')->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $this->get('request')->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render('PurmeoEshopBundle:User:login.html.twig', array(
                    'last_username' => $this->get('request')->getSession()->get(SecurityContext::LAST_USERNAME),
                    'error' => $error,
                ));
    }

    public function loginCheckAction() {
        // The security layer will intercept this request
    }

    public function logoutAction() {
        // The security layer will intercept this request
    }

    /**
     * @Secure(roles="ROLE_USER")
     */
    public function indexAction() {

        return $this->render('PurmeoEshopBundle:User:index.html.twig', array(
                    'user' => $this->getUser(),
                ));
    }

    public function registerAction() {
        $message = '';
        $entity = new Register();
        $type = new RegisterType();
        $form = $this->createForm($type, $entity);
        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $co = $this->container;
                $ip = $request->getClientIp();

                $groupUser = $em->getRepository('PurmeoEshopBundle:Groups')
                        ->getRoleUser();

                $user = $em->getRepository('PurmeoEshopBundle:User')
                        ->createUser($entity->getEmail(), $entity->getFirstname(), $entity->getLastname(), $ip, $em, $this, $groupUser, $co);
                if (!($user === false)) {
                    $address = $em->getRepository('PurmeoEshopBundle:Address')
                            ->createAddress2($user, $entity, 1, $em);

                    if ($user->getId() > 0 && $address->getId() > 0) {
                        return $this->redirect($this->generateUrl('purmeo_eshop_user'));
                    }
                } else {
                    $message = 'Ihrer Email hat bereits ein Benutzerkonto, bitte melden Sie sich an!';
                }
            }
        }
        return $this->render('PurmeoEshopBundle:User:register.html.twig', array(
                    'form' => $form->createView(),
                    'message' => $message
                ));
    }

}
