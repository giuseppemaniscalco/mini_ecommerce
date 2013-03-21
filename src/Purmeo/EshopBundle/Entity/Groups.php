<?php

namespace Purmeo\EshopBundle\Entity;

use Symfony\Component\Security\Core\Role\RoleInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Purmeo\EshopBundle\Entity\Repository\GroupsRepository")
 * @ORM\Table(name="Groups")
 */
class Groups implements RoleInterface, \Serializable {

    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="name", type="string")
     */
    protected $name;

    /**
     * @ORM\Column(name="role", type="string", unique=true)
     */
    protected $role;

    /**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="groups")
     */
    protected $users;

    public function __construct() {
        $this->users = new ArrayCollection();
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize() {
        /*
         * ! Don't serialize $users field !
         */
        return \serialize(array(
                    $this->id,
                    $this->role
                ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized) {
        list(
                $this->id,
                $this->role
                ) = \unserialize($serialized);
    }

    /**
     * @see RoleInterface
     */
    public function getRole() {
        return $this->role;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Groups
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set role
     *
     * @param string $role
     * @return Groups
     */
    public function setRole($role) {
        $this->role = $role;

        return $this;
    }

    /**
     * Add users
     *
     * @param \Purmeo\EshopBundle\Entity\User $users
     * @return Groups
     */
    public function addUser(\Purmeo\EshopBundle\Entity\User $users) {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \Purmeo\EshopBundle\Entity\User $users
     */
    public function removeUser(\Purmeo\EshopBundle\Entity\User $users) {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers() {
        return $this->users;
    }

}