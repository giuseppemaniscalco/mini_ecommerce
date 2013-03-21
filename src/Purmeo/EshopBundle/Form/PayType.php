<?php

namespace Purmeo\EshopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class PayType extends AbstractType {

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
        $builder->add('userEmail', 'text', array('required' => false));
        $builder->add('billingTitle', 'choice', array(
            'choices' => $this->titles,
            'required' => false
        ));
        $builder->add('billingFirstname', 'text', array('required' => false));
        $builder->add('billingLastname', 'text', array('required' => false));
        $builder->add('billingStreet', 'text', array('required' => false));
        $builder->add('billingNumber', 'text', array('required' => false));
        $builder->add('billingOtherInfo', 'text', array('required' => false));
        $builder->add('billingZipcode', 'text', array('required' => false));
        $builder->add('billingCity', 'text', array('required' => false));
        $builder->add('billingCountry', 'choice', array(
            'choices' => $this->countries,
            'required' => false
        ));
        $builder->add('billingTelephone', 'text', array('required' => false));
        $builder->add('shippingTitle', 'choice', array(
            'choices' => $this->titles,
            'required' => false
        ));
        $builder->add('shippingFirstname', 'text', array('required' => false));
        $builder->add('shippingLastname', 'text', array('required' => false));
        $builder->add('shippingStreet', 'text', array('required' => false));
        $builder->add('shippingNumber', 'text', array('required' => false));
        $builder->add('shippingOtherInfo', 'text', array('required' => false));
        $builder->add('shippingZipcode', 'text', array('required' => false));
        $builder->add('shippingCity', 'text', array('required' => false));
        $builder->add('shippingCountry', 'choice', array(
            'choices' => $this->countries,
            'required' => false
        ));
        $builder->add('shippingTelephone', 'text', array('required' => false));
        $builder->add('agree', 'choice', array(
            'choices' => array('ok'),
            'multiple' => true,
            'expanded' => true,
            'required' => false
        ));
        $builder->add('sameShipping', 'choice', array(
            'choices' => array('ok'),
            'multiple' => true,
            'expanded' => true,
            'required' => false
        ));
        $builder->add('method', 'choice', array(
            'choices' => array('Elektronisches Lastschriftverfahren*', 'Kreditkarte*'),
            'multiple' => false,
            'expanded' => true,
            'required' => false
        ));
    }

    public function getName() {
        return 'pay';
    }

}