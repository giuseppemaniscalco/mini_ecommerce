<?php

namespace Purmeo\EshopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;

/**
 * @ORM\Entity(repositoryClass="Purmeo\EshopBundle\Entity\Repository\PayRepository")
 * @ORM\Table(name="Pay")
 * @ORM\HasLifecycleCallbacks
 */
class Pay {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $userEmail;

    /**
     * @ORM\Column(type="integer")
     */
    protected $billingTitle;

    /**
     * @ORM\Column(type="string")
     */
    protected $billingFirstname;

    /**
     * @ORM\Column(type="string")
     */
    protected $billingLastname;

    /**
     * @ORM\Column(type="string")
     */
    protected $billingStreet;

    /**
     * @ORM\Column(type="string")
     */
    protected $billingNumber;

    /**
     * @ORM\Column(type="string")
     */
    protected $billingOtherInfo;

    /**
     * @ORM\Column(type="string")
     */
    protected $billingZipcode;

    /**
     * @ORM\Column(type="string")
     */
    protected $billingCity;

    /**
     * @ORM\Column(type="integer")
     */
    protected $billingCountry;

    /**
     * @ORM\Column(type="string")
     */
    protected $billingTelephone;

    /**
     * @ORM\Column(type="integer")
     */
    protected $shippingTitle;

    /**
     * @ORM\Column(type="string")
     */
    protected $shippingFirstname;

    /**
     * @ORM\Column(type="string")
     */
    protected $shippingLastname;

    /**
     * @ORM\Column(type="string")
     */
    protected $shippingStreet;

    /**
     * @ORM\Column(type="string")
     */
    protected $shippingNumber;

    /**
     * @ORM\Column(type="string")
     */
    protected $shippingOtherInfo;

    /**
     * @ORM\Column(type="string")
     */
    protected $shippingZipcode;

    /**
     * @ORM\Column(type="string")
     */
    protected $shippingCity;

    /**
     * @ORM\Column(type="integer")
     */
    protected $shippingCountry;

    /**
     * @ORM\Column(type="string")
     */
    protected $shippingTelephone;

    protected $agree;

    protected $sameShipping;

    /**
     * @ORM\Column(type="integer")
     */
    protected $method;

    /**
     * @ORM\ManyToOne(targetEntity="Orders", inversedBy="pays")
     * @ORM\JoinColumn(name="order_id", referencedColumnName="id")
     */
    protected $order;

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

    public static function loadValidatorMetadata(ClassMetadata $metadata) {
        $metadata->addPropertyConstraint('userEmail', new Email(array(
                    'message' => 'Ung&uuml;ltige E-mail Adresse!'
                )));
        $metadata->addPropertyConstraint('userEmail', new NotBlank(array(
                    'message' => 'Dies ist ein Pflichtfeld'
                )));
        $metadata->addPropertyConstraint('billingTitle', new NotBlank(array(
                    'message' => 'Dies ist ein Pflichtfeld'
                )));
        $metadata->addPropertyConstraint('billingFirstname', new NotBlank(array(
                    'message' => 'Dies ist ein Pflichtfeld'
                )));
        $metadata->addPropertyConstraint('billingLastname', new NotBlank(array(
                    'message' => 'Dies ist ein Pflichtfeld'
                )));
        $metadata->addPropertyConstraint('billingStreet', new NotBlank(array(
                    'message' => 'Dies ist ein Pflichtfeld'
                )));
        $metadata->addPropertyConstraint('billingNumber', new NotBlank(array(
                    'message' => 'Dies ist ein Pflichtfeld'
                )));
        $metadata->addPropertyConstraint('billingZipcode', new NotBlank(array(
                    'message' => 'Dies ist ein Pflichtfeld'
                )));
        $metadata->addPropertyConstraint('billingCity', new NotBlank(array(
                    'message' => 'Dies ist ein Pflichtfeld'
                )));
        $metadata->addPropertyConstraint('billingCountry', new NotBlank(array(
                    'message' => 'Dies ist ein Pflichtfeld'
                )));
        $metadata->addPropertyConstraint('agree', new NotBlank(array(
                    'message' => 'Bitte akzeptieren Sie unsere AGB!'
                )));
        $metadata->addPropertyConstraint('method', new NotBlank(array(
                    'message' => 'Bitte best&auml;tigen Sie die Bezahlung!'
                )));
    }

    /**
     * Set userEmail
     *
     * @param string $userEmail
     * @return Pay
     */
    public function setUserEmail($userEmail) {
        $this->userEmail = $userEmail;

        return $this;
    }

    /**
     * Get userEmail
     *
     * @return string 
     */
    public function getUserEmail() {
        return $this->userEmail;
    }

    /**
     * Set billingTitle
     *
     * @param integer $billingTitle
     * @return Pay
     */
    public function setBillingTitle($billingTitle) {
        $this->billingTitle = $billingTitle;

        return $this;
    }

    /**
     * Get billingTitle
     *
     * @return integer 
     */
    public function getBillingTitle() {
        return $this->billingTitle;
    }

    /**
     * Set billingFirstname
     *
     * @param string $billingFirstname
     * @return Pay
     */
    public function setBillingFirstname($billingFirstname) {
        $this->billingFirstname = $billingFirstname;

        return $this;
    }

    /**
     * Get billingFirstname
     *
     * @return string 
     */
    public function getBillingFirstname() {
        return $this->billingFirstname;
    }

    /**
     * Set billingLastname
     *
     * @param string $billingLastname
     * @return Pay
     */
    public function setBillingLastname($billingLastname) {
        $this->billingLastname = $billingLastname;

        return $this;
    }

    /**
     * Get billingLastname
     *
     * @return string 
     */
    public function getBillingLastname() {
        return $this->billingLastname;
    }

    /**
     * Set billingStreet
     *
     * @param string $billingStreet
     * @return Pay
     */
    public function setBillingStreet($billingStreet) {
        $this->billingStreet = $billingStreet;

        return $this;
    }

    /**
     * Get billingStreet
     *
     * @return string 
     */
    public function getBillingStreet() {
        return $this->billingStreet;
    }

    /**
     * Set billingNumber
     *
     * @param string $billingNumber
     * @return Pay
     */
    public function setBillingNumber($billingNumber) {
        $this->billingNumber = $billingNumber;

        return $this;
    }

    /**
     * Get billingNumber
     *
     * @return string 
     */
    public function getBillingNumber() {
        return $this->billingNumber;
    }

    /**
     * Set billingOtherInfo
     *
     * @param string $billingOtherInfo
     * @return Pay
     */
    public function setBillingOtherInfo($billingOtherInfo) {
        $this->billingOtherInfo = $billingOtherInfo;

        return $this;
    }

    /**
     * Get billingOtherInfo
     *
     * @return string 
     */
    public function getBillingOtherInfo() {
        return $this->billingOtherInfo;
    }

    /**
     * Set billingZipcode
     *
     * @param string $billingZipcode
     * @return Pay
     */
    public function setBillingZipcode($billingZipcode) {
        $this->billingZipcode = $billingZipcode;

        return $this;
    }

    /**
     * Get billingZipcode
     *
     * @return string 
     */
    public function getBillingZipcode() {
        return $this->billingZipcode;
    }

    /**
     * Set billingCity
     *
     * @param string $billingCity
     * @return Pay
     */
    public function setBillingCity($billingCity) {
        $this->billingCity = $billingCity;

        return $this;
    }

    /**
     * Get billingCity
     *
     * @return string 
     */
    public function getBillingCity() {
        return $this->billingCity;
    }

    /**
     * Set billingCountry
     *
     * @param integer $billingCountry
     * @return Pay
     */
    public function setBillingCountry($billingCountry) {
        $this->billingCountry = $billingCountry;

        return $this;
    }

    /**
     * Get billingCountry
     *
     * @return integer 
     */
    public function getBillingCountry() {
        return $this->billingCountry;
    }

    /**
     * Set billingTelephone
     *
     * @param string $billingTelephone
     * @return Pay
     */
    public function setBillingTelephone($billingTelephone) {
        $this->billingTelephone = $billingTelephone;

        return $this;
    }

    /**
     * Get billingTelephone
     *
     * @return string 
     */
    public function getBillingTelephone() {
        return $this->billingTelephone;
    }

    /**
     * Set shippingTitle
     *
     * @param integer $shippingTitle
     * @return Pay
     */
    public function setShippingTitle($shippingTitle) {
        $this->shippingTitle = $shippingTitle;

        return $this;
    }

    /**
     * Get shippingTitle
     *
     * @return integer 
     */
    public function getShippingTitle() {
        return $this->shippingTitle;
    }

    /**
     * Set shippingFirstname
     *
     * @param string $shippingFirstname
     * @return Pay
     */
    public function setShippingFirstname($shippingFirstname) {
        $this->shippingFirstname = $shippingFirstname;

        return $this;
    }

    /**
     * Get shippingFirstname
     *
     * @return string 
     */
    public function getShippingFirstname() {
        return $this->shippingFirstname;
    }

    /**
     * Set shippingLastname
     *
     * @param string $shippingLastname
     * @return Pay
     */
    public function setShippingLastname($shippingLastname) {
        $this->shippingLastname = $shippingLastname;

        return $this;
    }

    /**
     * Get shippingLastname
     *
     * @return string 
     */
    public function getShippingLastname() {
        return $this->shippingLastname;
    }

    /**
     * Set shippingStreet
     *
     * @param string $shippingStreet
     * @return Pay
     */
    public function setShippingStreet($shippingStreet) {
        $this->shippingStreet = $shippingStreet;

        return $this;
    }

    /**
     * Get shippingStreet
     *
     * @return string 
     */
    public function getShippingStreet() {
        return $this->shippingStreet;
    }

    /**
     * Set shippingNumber
     *
     * @param string $shippingNumber
     * @return Pay
     */
    public function setShippingNumber($shippingNumber) {
        $this->shippingNumber = $shippingNumber;

        return $this;
    }

    /**
     * Get shippingNumber
     *
     * @return string 
     */
    public function getShippingNumber() {
        return $this->shippingNumber;
    }

    /**
     * Set shippingOtherInfo
     *
     * @param string $shippingOtherInfo
     * @return Pay
     */
    public function setShippingOtherInfo($shippingOtherInfo) {
        $this->shippingOtherInfo = $shippingOtherInfo;

        return $this;
    }

    /**
     * Get shippingOtherInfo
     *
     * @return string 
     */
    public function getShippingOtherInfo() {
        return $this->shippingOtherInfo;
    }

    /**
     * Set shippingZipcode
     *
     * @param string $shippingZipcode
     * @return Pay
     */
    public function setShippingZipcode($shippingZipcode) {
        $this->shippingZipcode = $shippingZipcode;

        return $this;
    }

    /**
     * Get shippingZipcode
     *
     * @return string 
     */
    public function getShippingZipcode() {
        return $this->shippingZipcode;
    }

    /**
     * Set shippingCity
     *
     * @param string $shippingCity
     * @return Pay
     */
    public function setShippingCity($shippingCity) {
        $this->shippingCity = $shippingCity;

        return $this;
    }

    /**
     * Get shippingCity
     *
     * @return string 
     */
    public function getShippingCity() {
        return $this->shippingCity;
    }

    /**
     * Set shippingCountry
     *
     * @param integer $shippingCountry
     * @return Pay
     */
    public function setShippingCountry($shippingCountry) {
        $this->shippingCountry = $shippingCountry;

        return $this;
    }

    /**
     * Get shippingCountry
     *
     * @return integer 
     */
    public function getShippingCountry() {
        return $this->shippingCountry;
    }

    /**
     * Set shippingTelephone
     *
     * @param string $shippingTelephone
     * @return Pay
     */
    public function setShippingTelephone($shippingTelephone) {
        $this->shippingTelephone = $shippingTelephone;

        return $this;
    }

    /**
     * Get shippingTelephone
     *
     * @return string 
     */
    public function getShippingTelephone() {
        return $this->shippingTelephone;
    }

    /**
     * Set agree
     *
     * @param integer $agree
     * @return Pay
     */
    public function setAgree($agree) {
        $this->agree = $agree;

        return $this;
    }

    /**
     * Get agree
     *
     * @return integer 
     */
    public function getAgree() {
        return $this->agree;
    }

    /**
     * Set sameShipping
     *
     * @param integer $sameShipping
     * @return Pay
     */
    public function setSameShipping($sameShipping) {
        $this->sameShipping = $sameShipping;

        return $this;
    }

    /**
     * Get sameShipping
     *
     * @return integer 
     */
    public function getSameShipping() {
        return $this->sameShipping;
    }

    /**
     * Set method
     *
     * @param integer $method
     * @return Pay
     */
    public function setMethod($method) {
        $this->method = $method;

        return $this;
    }

    /**
     * Get method
     *
     * @return integer 
     */
    public function getMethod() {
        return $this->method;
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
     * Set actived
     *
     * @param boolean $actived
     * @return Pay
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
     * @return Pay
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
     * @return Pay
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
     * Set order
     *
     * @param \Purmeo\EshopBundle\Entity\Orders $order
     * @return Pay
     */
    public function setOrder(\Purmeo\EshopBundle\Entity\Orders $order = null)
    {
        $this->order = $order;
    
        return $this;
    }

    /**
     * Get order
     *
     * @return \Purmeo\EshopBundle\Entity\Orders 
     */
    public function getOrder()
    {
        return $this->order;
    }
}