<?php

namespace Purmeo\EshopBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Purmeo\EshopBundle\Entity\Component;

class ComponentFixtures extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {

        $component = new Component();
        $component->setCode('1');
        $component->setName('1_Kapsel_Weiß_ID_1');
        $manager->persist($component);

        $component = new Component();
        $component->setCode('2');
        $component->setName('2_Kapsel_weiß-türkis_ID_2');
        $manager->persist($component);

        $component = new Component();
        $component->setCode('3');
        $component->setName('3_Kapsel_weiß-hellgrün_ID_3');
        $manager->persist($component);

        $component = new Component();
        $component->setCode('4');
        $component->setName('4_Kapsel_weiß-dunkelgrün_ID_4');
        $manager->persist($component);

        $component = new Component();
        $component->setCode('5');
        $component->setName('5_Kapsel_grün-perlgrün_ID_5');
        $manager->persist($component);

        $component = new Component();
        $component->setCode('6');
        $component->setName('6_Kapsel_hellgrün_ID_6');
        $manager->persist($component);

        $component = new Component();
        $component->setCode('7');
        $component->setName('7_Kapsel_dunkelgrün_ID_7');
        $manager->persist($component);

        $component = new Component();
        $component->setCode('8');
        $component->setName('8_Kapsel_dunkelgelb_ID_8');
        $manager->persist($component);

        $component = new Component();
        $component->setCode('9');
        $component->setName('9_Kapsel_orange-rot_ID_9');
        $manager->persist($component);

        $component = new Component();
        $component->setCode('10');
        $component->setName('10_Kapsel_weiß-klarorange_ID_10');
        $manager->persist($component);

        $component = new Component();
        $component->setCode('11');
        $component->setName('11_Kapsel_weiß-orange_ID_11');
        $manager->persist($component);

        $component = new Component();
        $component->setCode('12');
        $component->setName('12_Kapsel_weiß-rot_ID_12');
        $manager->persist($component);

        $component = new Component();
        $component->setCode('13');
        $component->setName('13_Kapsel_dunkelrot_ID_13');
        $manager->persist($component);

        $component = new Component();
        $component->setCode('14');
        $component->setName('14_Kapsel_perlblau_ID_14');
        $manager->persist($component);

        $component = new Component();
        $component->setCode('15');
        $component->setName('15_Tablette_Rund_blau1_ID_15');
        $manager->persist($component);

        $component = new Component();
        $component->setCode('16');
        $component->setName('16_Tablette_Rund_blau2_ID_16');
        $manager->persist($component);

        $component = new Component();
        $component->setCode('17');
        $component->setName('17_Tablette_Rund_blau3_ID_17');
        $manager->persist($component);

        $component = new Component();
        $component->setCode('18');
        $component->setName('18_Tablette_Rund_blau4_ID_18');
        $manager->persist($component);

        $component = new Component();
        $component->setCode('19');
        $component->setName('19_Tablette_Rund_blau5_ID_19');
        $manager->persist($component);

        $component = new Component();
        $component->setCode('20');
        $component->setName('20_Kapsel_weiß-hellblau_ID_20');
        $manager->persist($component);

        $component = new Component();
        $component->setCode('21');
        $component->setName('21_Kapsel_weiß-blau_ID_21');
        $manager->persist($component);

        $component = new Component();
        $component->setCode('22');
        $component->setName('22_Kapsel_blau_ID_22');
        $manager->persist($component);

        $component = new Component();
        $component->setCode('23');
        $component->setName('23_Kapsel_gelb_ID_23');
        $manager->persist($component);

        $component = new Component();
        $component->setCode('24');
        $component->setName('24_Kapsel_gelb-grün_ID_24');
        $manager->persist($component);

        $component = new Component();
        $component->setCode('25');
        $component->setName('25_Kapsel_gelb-blau_ID_25');
        $manager->persist($component);

        $component = new Component();
        $component->setCode('26');
        $component->setName('26_Kapsel_gelb-rot_ID_26');
        $manager->persist($component);

        $component = new Component();
        $component->setCode('27');
        $component->setName('27_Tablette_Oblong_rot1_ID_27');
        $manager->persist($component);

        $component = new Component();
        $component->setCode('28');
        $component->setName('28_Tablette_Oblong_rot2_ID_28');
        $manager->persist($component);

        $component = new Component();
        $component->setCode('29');
        $component->setName('29_Tablette_Oblong_rot3_ID_29');
        $manager->persist($component);

        $component = new Component();
        $component->setCode('30');
        $component->setName('30_Tablette_Oblong_rot4_ID_30');
        $manager->persist($component);

        $component = new Component();
        $component->setCode('31');
        $component->setName('31_Tablette_Oblong_rot5_ID_31');
        $manager->persist($component);

        $component = new Component();
        $component->setCode('32');
        $component->setName('32_Kapsel_rosa_ID_32');
        $manager->persist($component);

        $component = new Component();
        $component->setCode('33');
        $component->setName('33_Kapsel_perlweiß_ID_33');
        $manager->persist($component);

        $component = new Component();
        $component->setCode('34');
        $component->setName('34_Kapsel_gold_ID_34');
        $manager->persist($component);

        $component = new Component();
        $component->setCode('35');
        $component->setName('35_Ölkapsel_Bernstein_ID_35');
        $manager->persist($component);

        $manager->flush();
    }

    public function getOrder() {
        return 1;
    }

}