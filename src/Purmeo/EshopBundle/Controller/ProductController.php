<?php

namespace Purmeo\EshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller {

    public function indexAction($id) {
        $product = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('PurmeoEshopBundle:Product')
                ->find($id);
        
        $message = '';
        if ($product) {
            $this->getRequest()
                    ->getSession()
                    ->set('productId', $id);

            return $this->redirect($this->generateUrl('purmeo_eshop_pay'));
        } else {
            $message = 'No product to add';
        }
        
        $products = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('PurmeoEshopBundle:Product')
                ->getProducts();

        return $this->render('PurmeoEshopBundle:Product:index.html.twig', array(
                    'products' => $products,
                    'message' => $message
                ));
    }

}