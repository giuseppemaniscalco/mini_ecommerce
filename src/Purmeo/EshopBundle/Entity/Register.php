<?php

namespace Purmeo\EshopBundle\Entity;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;

class Register {

    protected $email;
    protected $title;
    protected $firstname;
    protected $lastname;
    protected $street;
    protected $number;
    protected $otherInfo;
    protected $zipcode;
    protected $city;
    protected $country;
    protected $telephone;
    protected $agree;
        
    public static function loadValidatorMetadata(ClassMetadata $metadata) {
        $metadata->addPropertyConstraint('email', new Email(array(
                    'message' => 'Ungültige E-mail Adresse!'
                )));
        $metadata->addPropertyConstraint('title', new NotBlank(array(
                    'message' => 'Dies ist ein Pflichtfeld'
                )));
        $metadata->addPropertyConstraint('firstname', new NotBlank(array(
                    'message' => 'Dies ist ein Pflichtfeld'
                )));
        $metadata->addPropertyConstraint('lastname', new NotBlank(array(
                    'message' => 'Dies ist ein Pflichtfeld'
                )));
        $metadata->addPropertyConstraint('street', new NotBlank(array(
                    'message' => 'Dies ist ein Pflichtfeld'
                )));
        $metadata->addPropertyConstraint('zipcode', new NotBlank(array(
                    'message' => 'Dies ist ein Pflichtfeld'
                )));
        $metadata->addPropertyConstraint('city', new NotBlank(array(
                    'message' => 'Dies ist ein Pflichtfeld'
                )));
        $metadata->addPropertyConstraint('country', new NotBlank(array(
                    'message' => 'Dies ist ein Pflichtfeld'
                )));
        $metadata->addPropertyConstraint('telephone', new NotBlank(array(
                    'message' => 'Dies ist ein Pflichtfeld'
                )));
        $metadata->addPropertyConstraint('agree', new NotBlank(array(
                    'message' => 'Bitte akzeptieren Sie unsere AGB!'
                )));
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function setStreet($street) {
        $this->street = $street;
    }

    public function getStreet() {
        return $this->street;
    }

    public function setNumber($number) {
        $this->number = $number;
    }

    public function getNumber() {
        return $this->number;
    }

    public function setOtherInfo($otherInfo) {
        $this->otherInfo = $otherInfo;
    }

    public function getOtherInfo() {
        return $this->otherInfo;
    }

    public function setZipcode($zipcode) {
        $this->zipcode = $zipcode;
    }

    public function getZipcode() {
        return $this->zipcode;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function getCity() {
        return $this->city;
    }

    public function setCountry($country) {
        $this->country = $country;
    }

    public function getCountry() {
        return $this->country;
    }

    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    public function setAgree($agree) {
        $this->agree = $agree;
    }

    public function getAgree() {
        return $this->agree;
    }

}
