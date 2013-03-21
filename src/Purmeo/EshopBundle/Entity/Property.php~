<?php

namespace Purmeo\EshopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Purmeo\EshopBundle\Entity\Repository\PropertyRepository")
 * @ORM\Table(name="Property")
 * @ORM\HasLifecycleCallbacks
 */
class Property {

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
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="properties")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="id")
     */
    protected $product;

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
     * @return Property
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
     * Set actived
     *
     * @param boolean $actived
     * @return Property
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
     * @return Property
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
     * @return Property
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
     * Set product
     *
     * @param \Purmeo\EshopBundle\Entity\Product $product
     * @return Property
     */
    public function setProduct(\Purmeo\EshopBundle\Entity\Product $product = null)
    {
        $this->product = $product;
    
        return $this;
    }

    /**
     * Get product
     *
     * @return \Purmeo\EshopBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }
}