<?php

namespace Purmeo\EshopBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Purmeo\EshopBundle\Entity\Product;

class ProductFixtures extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        $product = new Product();
        $product->setName('Vitaminpaket');
        $product->setPrice(49.9);
        $product->setDiscount(30);
        $product->setTax(7);
        $product->setImageMain('media/shared/Homepage-Design/produkt/versand-badge.png');
        $manager->persist($product);

        $manager->flush();
        
        $this->addReference('product-1', $product);
    }

    public function getOrder() {
        return 1;
    }

}

