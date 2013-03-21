<?php

namespace Purmeo\EshopBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * GroupsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GroupsRepository extends EntityRepository
{
    public function getRoleUser(){

        $result = $this->findOneByRole('ROLE_USER');
        
        return $result;
    }


}