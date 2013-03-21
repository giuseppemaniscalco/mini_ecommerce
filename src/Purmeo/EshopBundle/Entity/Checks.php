<?php

namespace Purmeo\EshopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="Purmeo\EshopBundle\Entity\Repository\ChecksRepository")
 * @ORM\Table(name="Checks")
 * @ORM\HasLifecycleCallbacks
 */
class Checks {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $gender;

    /**
     * @ORM\Column(type="integer")
     */
    protected $weight;

    /**
     * @ORM\Column(type="integer")
     */
    protected $height;

    /**
     * @ORM\Column(type="integer")
     */
    protected $day;

    /**
     * @ORM\Column(type="integer")
     */
    protected $month;

    /**
     * @ORM\Column(type="integer")
     */
    protected $year;

    /**
     * @ORM\Column(type="integer")
     */
    protected $sport;

    /**
     * @ORM\Column(type="integer")
     */
    protected $smoker;

    /**
     * @ORM\Column(type="integer")
     */
    protected $drink;

    /**
     * @ORM\Column(type="integer")
     */
    protected $dream;

    /**
     * @ORM\Column(type="integer")
     */
    protected $stress;

    /**
     * @ORM\Column(type="integer")
     */
    protected $pregnant;

    /**
     * @ORM\Column(type="integer")
     */
    protected $grain;

    /**
     * @ORM\Column(type="integer")
     */
    protected $fruit;

    /**
     * @ORM\Column(type="integer")
     */
    protected $salad;

    /**
     * @ORM\Column(type="integer")
     */
    protected $meat;

    /**
     * @ORM\Column(type="integer")
     */
    protected $fish;

    /**
     * @ORM\Column(type="integer")
     */
    protected $milk;

    /**
     * @ORM\Column(type="integer")
     */
    protected $water;

    /**
     * @ORM\Column(type="integer")
     */
    protected $fastfood;

    /**
     * @ORM\Column(type="integer")
     */
    protected $sweets;

    /**
     * @ORM\Column(type="integer")
     */
    protected $diet;

    /**
     * @ORM\Column(type="integer")
     */
    protected $oil;

    /**
     * @ORM\Column(type="array") 
     */
    protected $problems;
        
    /**
     * @ORM\Column(type="array") 
     */
    protected $agree;

    /**
     * @ORM\ManyToOne(targetEntity="Orders", inversedBy="checks")
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
        $metadata->addPropertyConstraint('gender', new NotBlank(array(
                    'message' => 'Bitte geben Sie noch Ihr Geschlecht an'
                )));
        $metadata->addPropertyConstraint('weight', new NotBlank(array(
                    'message' => 'Noch kein Gewicht angegeben'
                )));
        $metadata->addPropertyConstraint('height', new NotBlank(array(
                    'message' => utf8_encode('Verraten Sie uns noch Ihre Größe')
                )));
        $metadata->addPropertyConstraint('day', new NotBlank(array(
                    'message' => 'Wie lautet Ihr Geburtsdatum?'
                )));
        $metadata->addPropertyConstraint('month', new NotBlank(array(
                    'message' => 'Wie lautet Ihr Geburtsdatum?'
                )));
        $metadata->addPropertyConstraint('year', new NotBlank(array(
                    'message' => 'Wie lautet Ihr Geburtsdatum?'
                )));
        $metadata->addPropertyConstraint('sport', new NotBlank(array(
                    'message' => 'Verraten Sie uns noch wie viel Sport Sie treiben'
                )));
        $metadata->addPropertyConstraint('smoker', new NotBlank(array(
                    'message' => 'Rauchen Sie?'
                )));
        $metadata->addPropertyConstraint('drink', new NotBlank(array(
                    'message' => utf8_encode('Uns fehlt noch Ihre Angabe zu alkoholischen Getränken')
                )));
        $metadata->addPropertyConstraint('dream', new NotBlank(array(
                    'message' => 'Beantworten Sie noch die Frage zu Ihrem Schlaf'
                )));
        $metadata->addPropertyConstraint('stress', new NotBlank(array(
                    'message' => 'Geben Sie Ihr Stresslevel an'
                )));
        $metadata->addPropertyConstraint('pregnant', new NotBlank(array(
                    'message' => 'Sind Sie schwanger?'
                )));
        $metadata->addPropertyConstraint('grain', new NotBlank(array(
                    'message' => 'Wie oft pro Woche essen Sie Vollkornprodukte?'
                )));
        $metadata->addPropertyConstraint('fruit', new NotBlank(array(
                    'message' => 'Es fehlt noch die Antwort zur Obst-Frage'
                )));
        $metadata->addPropertyConstraint('salad', new NotBlank(array(
                    'message' => utf8_encode('Wie viel Gemüse essen Sie?')
                )));
        $metadata->addPropertyConstraint('meat', new NotBlank(array(
                    'message' => utf8_encode('Eine einzelne Scheibe Salami reicht am Tag noch nicht für eine ausgewogene Ernährung mit tierischen Produkten aus. Das Frühstücksei, ein paar Wurstbrote oder ein Stück Fleisch zu Mittag zählen aber alle dazu. Alles an einem Tag muss natürlich nicht sein.')
                )));
        $metadata->addPropertyConstraint('fish', new NotBlank(array(
                    'message' => 'Uns fehlt noch die Angabe zu den Meerestieren'
                )));
        $metadata->addPropertyConstraint('milk', new NotBlank(array(
                    'message' => utf8_encode('Trinken Sie täglich Milch?')
                )));
        $metadata->addPropertyConstraint('water', new NotBlank(array(
                    'message' => 'Wie viel Wasser und Tee trinken Sie?'
                )));
        $metadata->addPropertyConstraint('fastfood', new NotBlank(array(
                    'message' => utf8_encode('Wie häufig essen Sie Fastfood und aufgewärmte Speisen?')
                )));
        $metadata->addPropertyConstraint('sweets', new NotBlank(array(
                    'message' => utf8_encode('Beantworten Sie noch die Frage zu Süßigkeiten')
                )));
        $metadata->addPropertyConstraint('diet', new NotBlank(array(
                    'message' => utf8_encode('Es fehlt noch die Angabe zu Diäten')
                )));
        $metadata->addPropertyConstraint('oil', new NotBlank(array(
                    'message' => utf8_encode('Bitte geben Sie noch eine Antwort zu den pflanzlichen ölen ein')
                )));
        $metadata->addPropertyConstraint('problems', new NotBlank(array(
                    'message' => 'Jetzt nur noch die Gesundheitsinfo eintragen'
                )));
        $metadata->addPropertyConstraint('agree', new NotBlank(array(
                    'message' => utf8_encode('Bitte die Datenschutzerklärung bestätigen.')
                )));
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
     * Set gender
     *
     * @param integer $gender
     * @return Checks
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    
        return $this;
    }

    /**
     * Get gender
     *
     * @return integer 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     * @return Checks
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    
        return $this;
    }

    /**
     * Get weight
     *
     * @return integer 
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set height
     *
     * @param integer $height
     * @return Checks
     */
    public function setHeight($height)
    {
        $this->height = $height;
    
        return $this;
    }

    /**
     * Get height
     *
     * @return integer 
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set day
     *
     * @param integer $day
     * @return Checks
     */
    public function setDay($day)
    {
        $this->day = $day;
    
        return $this;
    }

    /**
     * Get day
     *
     * @return integer 
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Set month
     *
     * @param integer $month
     * @return Checks
     */
    public function setMonth($month)
    {
        $this->month = $month;
    
        return $this;
    }

    /**
     * Get month
     *
     * @return integer 
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * Set year
     *
     * @param integer $year
     * @return Checks
     */
    public function setYear($year)
    {
        $this->year = $year;
    
        return $this;
    }

    /**
     * Get year
     *
     * @return integer 
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set sport
     *
     * @param integer $sport
     * @return Checks
     */
    public function setSport($sport)
    {
        $this->sport = $sport;
    
        return $this;
    }

    /**
     * Get sport
     *
     * @return integer 
     */
    public function getSport()
    {
        return $this->sport;
    }

    /**
     * Set smoker
     *
     * @param integer $smoker
     * @return Checks
     */
    public function setSmoker($smoker)
    {
        $this->smoker = $smoker;
    
        return $this;
    }

    /**
     * Get smoker
     *
     * @return integer 
     */
    public function getSmoker()
    {
        return $this->smoker;
    }

    /**
     * Set drink
     *
     * @param integer $drink
     * @return Checks
     */
    public function setDrink($drink)
    {
        $this->drink = $drink;
    
        return $this;
    }

    /**
     * Get drink
     *
     * @return integer 
     */
    public function getDrink()
    {
        return $this->drink;
    }

    /**
     * Set dream
     *
     * @param integer $dream
     * @return Checks
     */
    public function setDream($dream)
    {
        $this->dream = $dream;
    
        return $this;
    }

    /**
     * Get dream
     *
     * @return integer 
     */
    public function getDream()
    {
        return $this->dream;
    }

    /**
     * Set stress
     *
     * @param integer $stress
     * @return Checks
     */
    public function setStress($stress)
    {
        $this->stress = $stress;
    
        return $this;
    }

    /**
     * Get stress
     *
     * @return integer 
     */
    public function getStress()
    {
        return $this->stress;
    }

    /**
     * Set pregnant
     *
     * @param integer $pregnant
     * @return Checks
     */
    public function setPregnant($pregnant)
    {
        $this->pregnant = $pregnant;
    
        return $this;
    }

    /**
     * Get pregnant
     *
     * @return integer 
     */
    public function getPregnant()
    {
        return $this->pregnant;
    }

    /**
     * Set grain
     *
     * @param integer $grain
     * @return Checks
     */
    public function setGrain($grain)
    {
        $this->grain = $grain;
    
        return $this;
    }

    /**
     * Get grain
     *
     * @return integer 
     */
    public function getGrain()
    {
        return $this->grain;
    }

    /**
     * Set fruit
     *
     * @param integer $fruit
     * @return Checks
     */
    public function setFruit($fruit)
    {
        $this->fruit = $fruit;
    
        return $this;
    }

    /**
     * Get fruit
     *
     * @return integer 
     */
    public function getFruit()
    {
        return $this->fruit;
    }

    /**
     * Set salad
     *
     * @param integer $salad
     * @return Checks
     */
    public function setSalad($salad)
    {
        $this->salad = $salad;
    
        return $this;
    }

    /**
     * Get salad
     *
     * @return integer 
     */
    public function getSalad()
    {
        return $this->salad;
    }

    /**
     * Set meat
     *
     * @param integer $meat
     * @return Checks
     */
    public function setMeat($meat)
    {
        $this->meat = $meat;
    
        return $this;
    }

    /**
     * Get meat
     *
     * @return integer 
     */
    public function getMeat()
    {
        return $this->meat;
    }

    /**
     * Set fish
     *
     * @param integer $fish
     * @return Checks
     */
    public function setFish($fish)
    {
        $this->fish = $fish;
    
        return $this;
    }

    /**
     * Get fish
     *
     * @return integer 
     */
    public function getFish()
    {
        return $this->fish;
    }

    /**
     * Set milk
     *
     * @param integer $milk
     * @return Checks
     */
    public function setMilk($milk)
    {
        $this->milk = $milk;
    
        return $this;
    }

    /**
     * Get milk
     *
     * @return integer 
     */
    public function getMilk()
    {
        return $this->milk;
    }

    /**
     * Set water
     *
     * @param integer $water
     * @return Checks
     */
    public function setWater($water)
    {
        $this->water = $water;
    
        return $this;
    }

    /**
     * Get water
     *
     * @return integer 
     */
    public function getWater()
    {
        return $this->water;
    }

    /**
     * Set fastfood
     *
     * @param integer $fastfood
     * @return Checks
     */
    public function setFastfood($fastfood)
    {
        $this->fastfood = $fastfood;
    
        return $this;
    }

    /**
     * Get fastfood
     *
     * @return integer 
     */
    public function getFastfood()
    {
        return $this->fastfood;
    }

    /**
     * Set sweets
     *
     * @param integer $sweets
     * @return Checks
     */
    public function setSweets($sweets)
    {
        $this->sweets = $sweets;
    
        return $this;
    }

    /**
     * Get sweets
     *
     * @return integer 
     */
    public function getSweets()
    {
        return $this->sweets;
    }

    /**
     * Set diet
     *
     * @param integer $diet
     * @return Checks
     */
    public function setDiet($diet)
    {
        $this->diet = $diet;
    
        return $this;
    }

    /**
     * Get diet
     *
     * @return integer 
     */
    public function getDiet()
    {
        return $this->diet;
    }

    /**
     * Set oil
     *
     * @param integer $oil
     * @return Checks
     */
    public function setOil($oil)
    {
        $this->oil = $oil;
    
        return $this;
    }

    /**
     * Get oil
     *
     * @return integer 
     */
    public function getOil()
    {
        return $this->oil;
    }

    /**
     * Set problems
     *
     * @param integer $problems
     * @return Checks
     */
    public function setProblems($problems)
    {
        $this->problems = $problems;
    
        return $this;
    }

    /**
     * Get problems
     *
     * @return integer 
     */
    public function getProblems()
    {
        return $this->problems;
    }

    /**
     * Set actived
     *
     * @param boolean $actived
     * @return Checks
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
     * @return Checks
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
     * @return Checks
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
     * Set order
     *
     * @param \Purmeo\EshopBundle\Entity\Orders $order
     * @return Checks
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

    /**
     * Set agree
     *
     * @param integer $agree
     * @return Checks
     */
    public function setAgree($agree)
    {
        $this->agree = $agree;
    
        return $this;
    }

    /**
     * Get agree
     *
     * @return integer 
     */
    public function getAgree()
    {
        return $this->agree;
    }
}