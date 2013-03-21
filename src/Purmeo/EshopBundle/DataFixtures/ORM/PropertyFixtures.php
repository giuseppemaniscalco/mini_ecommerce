<?php

namespace Purmeo\EshopBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Purmeo\EshopBundle\Entity\Property;

class PropertyFixtures extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        
        $property = new Property();
        $property->setName('Individuell angepasster Vitaminkomplex');
        $property->setProduct($manager->merge($this->getReference('product-1')));      
        $manager->persist($property);

        $property = new Property();
        $property->setName('Vitamin-Check entwickelt von unseren Experten');
        $property->setProduct($manager->merge($this->getReference('product-1')));
        $manager->persist($property);

        $property = new Property();
        $property->setName("Purmeo Box mit Ihren Vitaminen f&uuml;r einen Monat");
        $property->setProduct($manager->merge($this->getReference('product-1')));
        $manager->persist($property);

        $manager->flush();
    }

    public function getOrder() {
        return 2;
    }

}

