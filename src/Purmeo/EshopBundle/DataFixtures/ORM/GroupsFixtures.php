<?php

namespace Purmeo\EshopBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Purmeo\EshopBundle\Entity\Groups;

class GroupsFixtures extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        
        $group = new Groups();
        $group->setName('user');
        $group->setRole('ROLE_USER');
        $manager->persist($group);

        $group = new Groups();
        $group->setName('admin');
        $group->setRole('ROLE_ADMIN');
        $manager->persist($group);

        $manager->flush();
    }

    public function getOrder() {
        return 1;
    }

}

