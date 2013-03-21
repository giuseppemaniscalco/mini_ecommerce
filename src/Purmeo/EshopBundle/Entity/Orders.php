<?php

namespace Purmeo\EshopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Purmeo\EshopBundle\Entity\Repository\OrdersRepository")
 * @ORM\Table(name="Orders")
 * @ORM\HasLifecycleCallbacks
 */
class Orders {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $code;

    /**
     * @ORM\Column(type="string")
     */
    protected $currency;

    /**
     * @ORM\Column(type="integer")
     */
    protected $status;

    /**
     * @ORM\ManyToMany(targetEntity="Product", inversedBy="orders")
     * @ORM\JoinTable(name="OrdersProduct")
     */
    protected $products;

    /**
     * @ORM\ManyToMany(targetEntity="Component", inversedBy="orders")
     * @ORM\JoinTable(name="OrdersComponent")
     */
    protected $components;

    /**
     * @ORM\ManyToMany(targetEntity="Address", inversedBy="orders")
     * @ORM\JoinTable(name="OrdersAddress")
     */
    protected $addresses;

    /**
     * @ORM\OneToMany(targetEntity="Pay", mappedBy="order")
     */
    protected $pays;

    /**
     * @ORM\OneToMany(targetEntity="Checks", mappedBy="order")
     */
    protected $checks;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="orders")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $actived;

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
        $this->products = new ArrayCollection();
        $this->components = new ArrayCollection();
        $this->setActived(true);
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
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return Order
     */
    public function setCode($code) {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode() {
        return $this->code;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Order
     */
    public function setStatus($status) {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * Set actived
     *
     * @param boolean $actived
     * @return Order
     */
    public function setActived($actived) {
        $this->actived = $actived;

        return $this;
    }

    /**
     * Get actived
     *
     * @return boolean 
     */
    public function getActived() {
        return $this->actived;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Order
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
     * @return Order
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
     * Add products
     *
     * @param \Purmeo\EshopBundle\Entity\Product $products
     * @return Orders
     */
    public function addProduct(\Purmeo\EshopBundle\Entity\Product $products) {
        $this->products[] = $products;

        return $this;
    }

    /**
     * Remove products
     *
     * @param \Purmeo\EshopBundle\Entity\Product $products
     */
    public function removeProduct(\Purmeo\EshopBundle\Entity\Product $products) {
        $this->products->removeElement($products);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProducts() {
        return $this->products;
    }

    /**
     * Add addresses
     *
     * @param \Purmeo\EshopBundle\Entity\Address $addresses
     * @return Orders
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
     * Set user
     *
     * @param \Purmeo\EshopBundle\Entity\User $user
     * @return Orders
     */
    public function setUser(\Purmeo\EshopBundle\Entity\User $user = null) {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Purmeo\EshopBundle\Entity\User 
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * Set currency
     *
     * @param string $currency
     * @return Orders
     */
    public function setCurrency($currency) {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return string 
     */
    public function getCurrency() {
        return $this->currency;
    }

    /**
     * Add components
     *
     * @param \Purmeo\EshopBundle\Entity\Component $components
     * @return Orders
     */
    public function addComponent(\Purmeo\EshopBundle\Entity\Component $components) {
        $this->components[] = $components;

        return $this;
    }

    /**
     * Remove components
     *
     * @param \Purmeo\EshopBundle\Entity\Component $components
     */
    public function removeComponent(\Purmeo\EshopBundle\Entity\Component $components) {
        $this->components->removeElement($components);
    }

    /**
     * Get components
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComponents() {
        return $this->components;
    }


    /**
     * Add pays
     *
     * @param \Purmeo\EshopBundle\Entity\Pay $pays
     * @return Orders
     */
    public function addPay(\Purmeo\EshopBundle\Entity\Pay $pays)
    {
        $this->pays[] = $pays;
    
        return $this;
    }

    /**
     * Remove pays
     *
     * @param \Purmeo\EshopBundle\Entity\Pay $pays
     */
    public function removePay(\Purmeo\EshopBundle\Entity\Pay $pays)
    {
        $this->pays->removeElement($pays);
    }

    /**
     * Get pays
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Add checks
     *
     * @param \Purmeo\EshopBundle\Entity\Checks $checks
     * @return Orders
     */
    public function addCheck(\Purmeo\EshopBundle\Entity\Checks $checks)
    {
        $this->checks[] = $checks;
    
        return $this;
    }

    /**
     * Remove checks
     *
     * @param \Purmeo\EshopBundle\Entity\Checks $checks
     */
    public function removeCheck(\Purmeo\EshopBundle\Entity\Checks $checks)
    {
        $this->checks->removeElement($checks);
    }

    /**
     * Get checks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChecks()
    {
        return $this->checks;
    }
}