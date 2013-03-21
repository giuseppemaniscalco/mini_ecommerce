<?php

namespace Purmeo\EshopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Purmeo\EshopBundle\Entity\Repository\SubscribesRepository")
 * @ORM\Table(name="Subscribes")
 * @ORM\HasLifecycleCallbacks
 */
class Subscribes
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $email;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $event;    

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
     * Set email
     *
     * @param string $email
     * @return Subscribes
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set actived
     *
     * @param boolean $actived
     * @return Subscribes
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
     * @return Subscribes
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
     * @return Subscribes
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
     * Set event
     *
     * @param integer $event
     * @return Subscribes
     */
    public function setEvent($event)
    {
        $this->event = $event;
    
        return $this;
    }

    /**
     * Get event
     *
     * @return integer 
     */
    public function getEvent()
    {
        return $this->event;
    }
}