<?php

namespace Miriade\EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Partner
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Miriade\EventBundle\Entity\PartnerRepository")
 */
class Partner
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
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="namecontact", type="string", length=255)
     */
    private $nameContact;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var int
     *
     * @ORM\Column(name="cp", type="integer", length=5)
     */
    private $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=255, nullable=true)
     */
    private $logo;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $statut;

    /**
     * @ORM\ManyToOne(targetEntity="Miriade\EventBundle\Entity\Event", inversedBy="partners", cascade={"persist"})
     * @ORM\JoinColumn(name="event_id", referencedColumnName="id")
     * */
    private $event;


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
     * @return Partner
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
     * Set phone
     *
     * @param string $phone
     * @return Partner
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Partner
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set logo
     *
     * @param string $logo
     * @return Partner
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Partner
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
     * @param \int $cp
     * @return Partner
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return \int
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Méthode qui permet de uploader un logo pour le partenaire courant et qui l'enregistre dans le dossier web/upload/images
     * @param $logo, le logo a uploader
     * @return bool
     */
    public function uploadLogo($logo)
    {
        $realName = $logo['name']['logo'];
        $ext = pathinfo($realName, PATHINFO_EXTENSION);
        $tmp_name = $logo['tmp_name']['logo'];
        $name = sha1(uniqid(mt_rand(), true)).'.'.$ext;
        if(move_uploaded_file($tmp_name,__DIR__."/../../../../web/upload/images/".$name)) {
            $this->logo = $name;
            return true;
        } else {
            return false;
        }
    }
    /**
     * Set event
     *
     * @param \Miriade\EventBundle\Entity\Event $event
     * @return Partner
     */
    public function setEvent(\Miriade\EventBundle\Entity\Event $event = null)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return \Miriade\EventBundle\Entity\Event
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Set statut
     *
     * @param string $statut
     * @return Partner
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return string
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return Partner
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set nameContact
     *
     * @param string $nameContact
     * @return Partner
     */
    public function setNameContact($nameContact)
    {
        $this->nameContact = $nameContact;

        return $this;
    }

    /**
     * Get nameContact
     *
     * @return string
     */
    public function getNameContact()
    {
        return $this->nameContact;
    }
}
