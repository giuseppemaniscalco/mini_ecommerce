<?php

namespace Purmeo\EshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Purmeo\EshopBundle\Form\CheckType;
use Purmeo\EshopBundle\Entity\Checks;
use JMS\SecurityExtraBundle\Annotation\Secure;

class CheckController extends Controller {

    /**
     * @Secure(roles="ROLE_USER")
     */
    public function indexAction() {
        $check = new Checks();
        $form = $this->createForm(new CheckType(), $check);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {

                $em = $this->getDoctrine()->getEntityManager();
                $ss = $this->getRequest()->getSession();

                $components = $em->getRepository('PurmeoEshopBundle:Component')
                        ->checkToComponent($check);

                $orderId = $ss->get('orderId');

                $order = $em->getRepository('PurmeoEshopBundle:Orders')
                        ->find($orderId);

                $em->getRepository('PurmeoEshopBundle:Checks')
                        ->createCheck($check, $order);

                $em->getRepository('PurmeoEshopBundle:Component')
                        ->addComponentsToOrder($components, $order, $em);

                $componentsXML = $em->getRepository('PurmeoEshopBundle:Component')
                        ->createComponentsXML($order, $this);

                $params = $this->getParams();

                $result = $em->getRepository('PurmeoEshopBundle:Orders')
                        ->sendComponentsToOM($componentsXML, $params);

                return $this->redirect($this->generateUrl('purmeo_eshop_thank'));
            }
        }

        return $this->render('PurmeoEshopBundle:Check:index.html.twig', array(
                    'form' => $form->createView(),
                ));
    }

    private function getParams() {
        $adyen = $this->container->getParameter('adyen');
        $env = $this->container->getParameter('kernel.environment');
        return $adyen[$env];
    }

}