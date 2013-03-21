<?php

namespace Purmeo\EshopBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;

/**
 * @ORM\Entity(repositoryClass="Purmeo\EshopBundle\Entity\Repository\UserRepository")
 * @ORM\Table(name="User")
 */
class User implements AdvancedUserInterface, EquatableInterface, \Serializable {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    protected $username;

    /**
     * @ORM\Column(type="string")
     */
    protected $password;

    /**
     * @ORM\Column(type="string")
     */
    protected $salt;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    protected $email;

    /**
     * @ORM\ManyToMany(targetEntity="Groups", inversedBy="users")
     * @ORM\JoinTable(name="UserGroups")
     */
    protected $groups;

    /**
     * @ORM\OneToMany(targetEntity="Address", mappedBy="user")
     */
    protected $addresses;

    /**
     * @ORM\OneToMany(targetEntity="Orders", mappedBy="user")
     */
    protected $orders;

    /**
     * @ORM\Column(type="string")
     */
    protected $ip;

    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $updated;

    public function __construct() {
        $this->addresses = new ArrayCollection();
        $this->orders = new ArrayCollection();
        $this->groups = new ArrayCollection();
        $this->setIsActive(true);
        $this->setSalt(hash('sha1', uniqid(null, true)));
        $this->setCreated(new \DateTime());
        $this->setUpdated(new \DateTime());
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedValue() {
        $this->setUpdated(new \DateTime());
    }

    /**
     * @inheritDoc
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * @inheritDoc
     */
    public function getSalt() {
        return $this->salt;
    }

    /**
     * @inheritDoc
     */
    public function getPassword() {
        return $this->password;
    }

    public function getRoles() {
        return $this->groups->toArray();
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials() {
        
    }

    /**
     * @inheritDoc
     */
    public function equals(UserInterface $user) {
        return $this->id === $user->getId();
    }
    
    /**
     * @inheritDoc
     */
    public function isEqualTo(UserInterface $user) {
        return $this->id === $user->getId();
    }
    
    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {

        return \serialize(array(
            $this->id,
            $this->username,
            $this->email,
            $this->salt,
            $this->password,
            $this->isActive
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->email,
            $this->salt,
            $this->password,
            $this->isActive
        ) = \unserialize($serialized);
    }

    public function isAccountNonExpired() {
        return true;
    }

    public function isAccountNonLocked() {
        return true;
    }

    public function isCredentialsNonExpired() {
        return true;
    }

    public function isEnabled() {
        return $this->isActive;
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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username) {
        $this->username = $username;

        return $this;
    }

    /**
     * Set password
     *
     * @param \password $password
     * @return User
     */
    public function setPassword($password) {
        $this->password = $password;

        return $this;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return User
     */
    public function setSalt($salt) {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return User
     */
    public function setIp($ip) {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp() {
        return $this->ip;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return User
     */
    public function setIsActive($isActive) {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean 
     */
    public function getIsActive() {
        return $this->isActive;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return User
     */
    public function setCreated($created) {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated() {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return User
     */
    public function setUpdated($updated) {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated() {
        return $this->updated;
    }

    /**
     * Add addresses
     *
     * @param \Purmeo\EshopBundle\Entity\Address $addresses
     * @return User
     */
    public function addAddresse(\Purmeo\EshopBundle\Entity\Address $addresses) {
        $this->addresses[] = $addresses;

        return $this;
    }

    /**
     * Remove addresses
     *
     * @param \Purmeo\EshopBundle\Entity\Address $addresses
     */
    public function removeAddresse(\Purmeo\EshopBundle\Entity\Address $addresses) {
        $this->addresses->removeElement($addresses);
    }

    /**
     * Get addresses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAddresses() {
        return $this->addresses;
    }

    /**
     * Add orders
     *
     * @param \Purmeo\EshopBundle\Entity\Orders $orders
     * @return User
     */
    public function addOrder(\Purmeo\EshopBundle\Entity\Orders $orders) {
        $this->orders[] = $orders;

        return $this;
    }

    /**
     * Remove orders
     *
     * @param \Purmeo\EshopBundle\Entity\Orders $orders
     */
    public function removeOrder(\Purmeo\EshopBundle\Entity\Orders $orders) {
        $this->orders->removeElement($orders);
    }

    /**
     * Get orders
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrders() {
        return $this->orders;
    }

    /**
     * Add groups
     *
     * @param \Purmeo\EshopBundle\Entity\Groups $groups
     * @return User
     */
    public function addGroup(\Purmeo\EshopBundle\Entity\Groups $groups) {
        $this->groups[] = $groups;

        return $this;
    }

    /**
     * Remove groups
     *
     * @param \Purmeo\EshopBundle\Entity\Groups $groups
     */
    public function removeGroup(\Purmeo\EshopBundle\Entity\Groups $groups) {
        $this->groups->removeElement($groups);
    }

    /**
     * Get groups
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGroups() {
        return $this->groups;
    }

}