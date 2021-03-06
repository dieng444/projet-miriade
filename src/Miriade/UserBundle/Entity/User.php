<?php

namespace Miriade\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\AttributeOverrides;
use Doctrine\ORM\Mapping\AttributeOverride;
use FOS\UserBundle\Model\User as BaseUser;
use Miriade\EventBundle\Entity\EventUser as EventUser;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="Miriade\UserBundle\Entity\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datesubscription", type="date")
     */
    private $dateSubscription;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="text")
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="text")
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="enterprise", type="text")
     */
    private $enterprise;

    /**
     * @var string
     *
     * @ORM\Column(name="job", type="text")
     */
    private $job;

    /**
     * @var string
     *
     * @ORM\Column(name="siret", type="text")
     */
    private $siret;

    /**
     * @var string
     *
     * @ORM\Column(name="adress", type="text")
     */
    private $adress;

    /**
     * @var integer
     *
     * @ORM\Column(name="zipcode", type="integer")
     */
    private $zipcode;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="text")
     */
    private $city;

    /**
     * @var integer
     *
     * @ORM\Column(name="phone", type="integer")
     */
    private $phone;

    /**
     * @ORM\OneToMany(targetEntity="Miriade\EventBundle\Entity\EventUser", mappedBy="participant")
     */
    private $events;


    public function __construct()
    {
        parent::__construct();
        $this->dateSubscription = new \Datetime();
        $this->addRole("ROLE_PARTICIPANT");
        $this->events = new ArrayCollection();
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
     * Set dateSubscription
     *
     * @param \DateTime $dateSubscription
     * @return User
     */
    public function setDateSubscription($dateSubscription)
    {
        $this->dateSubscription = $dateSubscription;

        return $this;
    }

    /**
     * Get dateSubscription
     *
     * @return \DateTime 
     */
    public function getDateSubscription()
    {
        return $this->dateSubscription;
    }

    public function setEmail($email){
        parent::setEmail($email);
        $this->setUsername($email);
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set enterprise
     *
     * @param string $enterprise
     * @return User
     */
    public function setEnterprise($enterprise)
    {
        $this->enterprise = $enterprise;

        return $this;
    }

    /**
     * Get enterprise
     *
     * @return string 
     */
    public function getEnterprise()
    {
        return $this->enterprise;
    }

    /**
     * Set job
     *
     * @param string $job
     * @return User
     */
    public function setJob($job)
    {
        $this->job = $job;

        return $this;
    }

    /**
     * Get job
     *
     * @return string 
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * Set siret
     *
     * @param string $siret
     * @return User
     */
    public function setSiret($siret)
    {
        $this->siret = $siret;

        return $this;
    }

    /**
     * Get siret
     *
     * @return string 
     */
    public function getSiret()
    {
        return $this->siret;
    }

    /**
     * Set adress
     *
     * @param string $adress
     * @return User
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;

        return $this;
    }

    /**
     * Get adress
     *
     * @return string 
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Set zipcode
     *
     * @param \int $zipcode
     * @return User
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    /**
     * Get zipcode
     *
     * @return \int 
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return User
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set phone
     *
     * @param \int $phone
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return \int 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    public function addEvent(EventUser $event)
    {
        $this->events[] = $event;
        return $this;
    }

    public function removeEvent(EventUser $event)
    {
        $this->events->removeElement($event);
    }

    public function getEvents()
    {
        return $this->events;
    }
}
