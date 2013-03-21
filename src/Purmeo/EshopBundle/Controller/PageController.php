<?php

namespace Purmeo\EshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller {

    public function indexAction() {
        return $this->render('PurmeoEshopBundle:Page:index.html.twig');
    }

    public function headerAction() {
        return $this->render('PurmeoEshopBundle:Page:header.html.twig');
    }

    public function footerAction() {
        return $this->render('PurmeoEshopBundle:Page:footer.html.twig');
    }
    
    public function thankAction() {
        return $this->render('PurmeoEshopBundle:Page:thank.html.twig');
    }    
    
    public function goToCheckAction() {
        return $this->render('PurmeoEshopBundle:Page:go_to_check.html.twig');
    }    
    
    public function categoryAction(){
        return $this->render('PurmeoEshopBundle:Page:category.html.twig');
    }

    public function boxAction(){
        return $this->render('PurmeoEshopBundle:Page:box.html.twig');
    }

    public function whyAction(){
        return $this->render('PurmeoEshopBundle:Page:why.html.twig');
    }

    public function agbAction(){
        return $this->render('PurmeoEshopBundle:Page:agb.html.twig');
    }

    public function presseAction(){
        return $this->render('PurmeoEshopBundle:Page:presse.html.twig');
    }

    public function partnerAction(){
        return $this->render('PurmeoEshopBundle:Page:partner.html.twig');
    }

    public function vitamineAction(){
        return $this->render('PurmeoEshopBundle:Page:vitamine.html.twig');
    }

    public function mineralstoffeAction(){
        return $this->render('PurmeoEshopBundle:Page:mineralstoffe.html.twig');
    }
    
    public function naehrstofflexikonAction(){
        return $this->render('PurmeoEshopBundle:Page:naehrstofflexikon.html.twig');
    }

    public function praeparateAction(){
        return $this->render('PurmeoEshopBundle:Page:praeparate.html.twig');
    }

    public function vitamineSchwangerschaftAction(){
        return $this->render('PurmeoEshopBundle:Page:vitamine_schwangerschaft.html.twig');
    }

}
