<?php

namespace Purmeo\EshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Purmeo\EshopBundle\Form\PayType;
use Purmeo\EshopBundle\Entity\Pay;
use JMS\SecurityExtraBundle\Annotation\Secure;

class OrderController extends Controller {

    /**
     * @Secure(roles="ROLE_USER")
     */
    public function indexAction() {

        return $this->render('PurmeoEshopBundle:Order:index.html.twig');
    }

    public function payAction() {

        $em = $this->getDoctrine()->getEntityManager();
        $ss = $this->getRequest()->getSession();

        $id = $ss->get('productId');

        $product = $em->getRepository('PurmeoEshopBundle:Product')
                ->find($id);

        $message = '';
        if (!$product) {
            $message = 'No product to add';
        }

        $pay = new Pay();
        $form = $this->createForm(new PayType(), $pay);
        $message = '';

        $isAdyenException = array();
        $request = $this->getRequest();

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            if ($form->isValid()) {

                $emailExisting = $em->getRepository('PurmeoEshopBundle:User')
                        ->checkExistsEmail($pay->getUserEmail());

                if (!$emailExisting) {

                    $ip = $request->getClientIp();
                    $orderId = $this->generateOrder($product, $pay, $ip);
                    if ($orderId) {

                        $params = $this->getParams();
                        $isAdyenException = $em->getRepository('PurmeoEshopBundle:Orders')
                                ->isAdyenException($request->request, $params);

                        if (empty($isAdyenException))
                            return $this->redirect($this->generateUrl('purmeo_eshop_go_to_check'));
                    } else {
                        $message = 'Leider ist ein Fehler bei Ihrer Bestellung aufgetreten!';
                    }
                } else {
                    $message = 'Ihrer Email hat bereits ein Benutzerkonto, bitte melden Sie sich an!';
                }
            }
        } else {
            $params = $this->getParams();
            $em->getRepository('PurmeoEshopBundle:Orders')
                    ->setOrderNumber($ss, $params);
        }
        return $this->render('PurmeoEshopBundle:Order:pay.html.twig', array(
                    'product' => $product,
                    'message' => $message,
                    'form' => $form->createView(),
                    'isAdyenException' => $isAdyenException
                ));
    }

    public function paymentAction() {

        $request = $this->getRequest();
        $result = array('false');

        if ($request->getMethod() == 'POST') {

            $params = $this->getParams();

            $em = $this->getDoctrine()->getEntityManager();
            $ss = $this->getRequest()->getSession();

            $paymentAmount = $request->request->get('paymentAmount', 0);
            $selectedMethod = (int) $request->request->get('selectedMethod', 0);
            $shopperEmail = $request->request->get('shopperEmail', 0);
            $productId = $request->request->get('productId', 0);

            $result = $em->getRepository('PurmeoEshopBundle:Orders')
                    ->getPayment($selectedMethod, $paymentAmount, $shopperEmail, $productId, $ss, $params);
        }

        $response = new Response();
        $response->setContent(json_encode($result));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    private function generateOrder($product, $form, $ip) {
        $em = $this->getDoctrine()->getManager();
        $ss = $this->getRequest()->getSession();
        $co = $this->container;

        $groupUser = $em->getRepository('PurmeoEshopBundle:Groups')
                ->getRoleUser();

        $user = $em->getRepository('PurmeoEshopBundle:User')
                ->createUser($form->getUserEmail(), $form->getBillingFirstname(), $form->getBillingLastname(), $ip, $em, $this, $groupUser, $co);

        if ($user) {

            $address['billing'] = $em->getRepository('PurmeoEshopBundle:Address')
                    ->createAddress($user, $form, 1, $em);

            if ($form->getSameShipping()) {
                $address['shipping'] = $em->getRepository('PurmeoEshopBundle:Address')
                        ->createAddress($user, $form, 2, $em);
            }

            $params = $this->getParams();

            $order = $em->getRepository('PurmeoEshopBundle:Orders')
                    ->createOrder($user, $address, $product, $em, $ss, $params, $this);

            $ss->set('orderId', $order->getId());

            $em->getRepository('PurmeoEshopBundle:Pay')
                    ->createPay($form, $order);

            $orderXML = $em->getRepository('PurmeoEshopBundle:Orders')
                    ->createOrderXML($user, $address, $order, $product, $form, $this);

            $result = $em->getRepository('PurmeoEshopBundle:Orders')
                    ->sendOrderToOM($orderXML, $params);
        } else {
            $result = false;
        }

        return $result;
    }

    private function getParams() {
        $adyen = $this->container->getParameter('adyen');
        $env = $this->container->getParameter('kernel.environment');

        return $adyen[$env];
    }

}