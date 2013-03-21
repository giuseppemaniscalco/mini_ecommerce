<?php

namespace Purmeo\EshopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Purmeo\EshopBundle\Entity\Repository\ProductRepository")
 * @ORM\Table(name="Product")
 * @ORM\HasLifecycleCallbacks
 */
class Product {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2)
     */
    protected $price;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2)
     */
    protected $discount;

    /**
     * @ORM\Column(type="decimal", precision=8, scale=2)
     */
    protected $tax;

    /**
     *
     * @ORM\Column(type="string")
     */
    protected $imageMain;

    /**
     * @ORM\OneToMany(targetEntity="Property", mappedBy="product")
     */
    protected $properties;

    /**
     * @ORM\ManyToMany(targetEntity="Orders", mappedBy="products")
     */
    protected $orders;

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
        $this->properties = new ArrayCollection();
        $this->orders = new ArrayCollection();
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
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;
    
        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set discount
     *
     * @param float $discount
     * @return Product
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
    
        return $this;
    }

    /**
     * Get discount
     *
     * @return float 
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Set tax
     *
     * @param float $tax
     * @return Product
     */
    public function setTax($tax)
    {
        $this->tax = $tax;
    
        return $this;
    }

    /**
     * Get tax
     *
     * @return float 
     */
    public function getTax()
    {
        return $this->tax;
    }

    /**
     * Set imageMain
     *
     * @param string $imageMain
     * @return Product
     */
    public function setImageMain($imageMain)
    {
        $this->imageMain = $imageMain;
    
        return $this;
    }

    /**
     * Get imageMain
     *
     * @return string 
     */
    public function getImageMain()
    {
        return $this->imageMain;
    }

    /**
     * Set actived
     *
     * @param boolean $actived
     * @return Product
     */
    public function setActived($actived)
    {
        $this->actived = $actived;
    
        return $this;
    }

    /**
     * Get actived
     *
     * @return boolean 
     */
    public function getActived()
    {
        return $this->actived;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Product
     */
    public function setCreated($created)
    {
        $this->created = $created;
    
        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Product
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    
        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Add properties
     *
     * @param \Purmeo\EshopBundle\Entity\Property $properties
     * @return Product
     */
    public function addPropertie(\Purmeo\EshopBundle\Entity\Property $properties)
    {
        $this->properties[] = $properties;
    
        return $this;
    }

    /**
     * Remove properties
     *
     * @param \Purmeo\EshopBundle\Entity\Property $properties
     */
    public function removePropertie(\Purmeo\EshopBundle\Entity\Property $properties)
    {
        $this->properties->removeElement($properties);
    }

    /**
     * Get properties
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * Add orders
     *
     * @param \Purmeo\EshopBundle\Entity\Orders $orders
     * @return Product
     */
    public function addOrder(\Purmeo\EshopBundle\Entity\Orders $orders)
    {
        $this->orders[] = $orders;
    
        return $this;
    }

    /**
     * Remove orders
     *
     * @param \Purmeo\EshopBundle\Entity\Orders $orders
     */
    public function removeOrder(\Purmeo\EshopBundle\Entity\Orders $orders)
    {
        $this->orders->removeElement($orders);
    }

    /**
     * Get orders
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrders()
    {
        return $this->orders;
    }
}