<?php

namespace Purmeo\EshopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegisterType extends AbstractType {

    protected $titles = array(
        'Herr' => 'Herr',
        'Frau' => 'Frau');
    protected $countries = array(
        'Deutschland' => 'Deutschland',
        'Österreich' => 'Österreich',
        'UK' => 'UK',
        'Spain' => 'Spain',
        'Frankreich' => 'Frankreich',
        'Sonstiges' => 'Sonstiges');

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('email', 'text', array('required' => true));
        $builder->add('title', 'choice', array('choices' => $this->titles, 'required' => true));
        $builder->add('firstname', 'text', array('required' => true));
        $builder->add('lastname', 'text', array('required' => true));
        $builder->add('street', 'text', array('required' => true));
        $builder->add('number', 'text', array('required' => true));
        $builder->add('otherInfo', 'text', array('required' => false));
        $builder->add('zipcode', 'text', array('required' => true));
        $builder->add('city', 'text', array('required' => true));
        $builder->add('country', 'choice', array('choices' => $this->countries, 'required' => true));
        $builder->add('telephone', 'text', array('required' => false));
        $builder->add('agree', 'choice', array('choices' => array('ok'), 'multiple' => true, 'expanded' => true, 'required' => true));
    }

    public function getName() {
        return 'register';
    }

}