<?php

namespace Miriade\EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Event
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Miriade\EventBundle\Entity\EventRepository")
 */
class Event
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(length=128, unique=true)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startDate",  type="string", length=100)
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endDate",  type="string", length=100)
     */
    private $endDate;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="limitDate",  type="string", length=100)
     */
    private $limitDate;

    /**
     * @var string
     *
     * @ORM\Column(name="locate", type="string", length=255)
     */
    private $adress;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="cp", type="integer", length=5)
     */
    private $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var integer
     * @ORM\Column(name="nbTable", type="integer", nullable=true)
     */
    private $nbTable;

    /**
     * @var integer
     * @ORM\Column(name="rdv", type="integer", nullable=true)
     */
    private $rdv;

    /**
     * @ORM\OneToMany(targetEntity="Miriade\EventBundle\Entity\Session", mappedBy="event", cascade={"remove"})
     */
    private $sessions;

    /**
     * @ORM\OneToMany(targetEntity="Miriade\EventBundle\Entity\Partner", mappedBy="event", cascade={"remove"})
     */
    private $partners;

    /**
     * @ORM\OneToMany(targetEntity="Miriade\EventBundle\Entity\EventUser", mappedBy="event", cascade={"remove"})
     */
    private $participants;
    /**
     * @ORM\OneToMany(targetEntity="Miriade\EventBundle\Entity\EventView", mappedBy="event", cascade={"remove"})
     */
    private $views;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sessions = new ArrayCollection();
        $this->partners = new ArrayCollection();
        $this->participants = new ArrayCollection();
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
     * Set title
     *
     * @param string $title
     * @return Event
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return Event
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return Event
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }


    /**
     * Get limitDate
     *
     * @return \DateTime
     */
    public function getLimitDate()
    {
        return $this->limitDate;
    }

    /**
     * Set limitDate
     *
     * @param \DateTime $limitDate
     * @return Event
     */
    public function setLimitDate($limitDate)
    {
        $this->limitDate = $limitDate;
        return $this;
    }

    /**
     * Set locate
     *
     * @param string $locate
     * @return Event
     */
    public function setLocate($locate)
    {
        $this->locate = $locate;

        return $this;
    }

    /**
     * Get locate
     *
     * @return string
     */
    public function getLocate()
    {
        return $this->locate;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Event
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Event
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set adress
     *
     * @param string $adress
     * @return Event
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
     * Set city
     *
     * @param string $city
     * @return Event
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
     * Set cp
     *
     * @param integer $cp
     * @return Event
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return integer
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set nbTable
     *
     * @param integer $nbTable
     * @return Event
     */
    public function setNbTable($nbTable)
    {
        $this->nbTable = $nbTable;

        return $this;
    }

    /**
     * Get nbTable
     *
     * @return integer
     */
    public function getNbTable()
    {
        return $this->nbTable;
    }

    /**
     * Set rdv
     *
     * @param integer $rdv
     * @return Event
     */
    public function setRdv($rdv)
    {
        $this->rdv = $rdv;

        return $this;
    }

    /**
     * Get rdv
     *
     * @return integer
     */
    public function getRdv()
    {
        return $this->rdv;
    }
    /**
     * Permet d'enregistrer l'image de l'événement
     * @param $image : l'image à enrégistrer
     * */
    public function uploadImage($image)
    {
		$realName = $image['name']['image'];
	    $ext = pathinfo($realName, PATHINFO_EXTENSION);
	    $tmp_name = $image['tmp_name']['image'];
	    $name = sha1(uniqid(mt_rand(), true)).'.'.$ext;
	    if(move_uploaded_file($tmp_name,__DIR__."/../../../../web/upload/images/".$name)) {
			$this->image = $name;
			return true;
		} else
			return false;
	}

    /**
     * Add sessions
     *
     * @param \Miriade\EventBundle\Entity\session $sessions
     * @return Event
     */
    public function addSession(\Miriade\EventBundle\Entity\session $sessions)
    {
        $this->sessions[] = $sessions;

        return $this;
    }

    /**
     * Remove sessions
     *
     * @param \Miriade\EventBundle\Entity\session $sessions
     */
    public function removeSession(\Miriade\EventBundle\Entity\session $sessions)
    {
        $this->sessions->removeElement($sessions);
    }

    /**
     * Get sessions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSessions()
    {
        return $this->sessions;
    }

    /**
     * Add partners
     *
     * @param \Miriade\EventBundle\Entity\Partner $partners
     * @return Event
     */
    public function addPartner(\Miriade\EventBundle\Entity\Partner $partners)
    {
        $this->partners[] = $partners;

        return $this;
    }

    /**
     * Remove partners
     *
     * @param \Miriade\EventBundle\Entity\Partner $partners
     */
    public function removePartner(\Miriade\EventBundle\Entity\Partner $partners)
    {
        $this->partners->removeElement($partners);
    }

    /**
     * Get partners
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPartners()
    {
        return $this->partners;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Event
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    public function addParticipant(EventUser $participant)
    {
        $this->participants[] = $participant;
        return $this;
    }

    public function removeParticipant(EventUser $participant)
    {
        $this->participants->removeElement($participant);
    }

    public function getParticipants()
    {
        return $this->participants;
    }

    /**
     * Add views
     *
     * @param \Miriade\EventBundle\Entity\EventView $views
     * @return Event
     */
    public function addView(\Miriade\EventBundle\Entity\EventView $views)
    {
        $this->views[] = $views;

        return $this;
    }

    /**
     * Remove views
     *
     * @param \Miriade\EventBundle\Entity\EventView $views
     */
    public function removeView(\Miriade\EventBundle\Entity\EventView $views)
    {
        $this->views->removeElement($views);
    }

    /**
     * Get views
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getViews()
    {
        return $this->views;
    }
}
