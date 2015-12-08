<?php

namespace Miriade\EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Session
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Miriade\EventBundle\Entity\SessionRepository")
 */
class Session
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horaireDebut", type="datetime")
     */
    private $horaireDebut;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horaireFin", type="datetime")
     */
    private $horaireFin;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;


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
     * @return Session
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
     * Set rangHoraire
     *
     * @param string $rangHoraire
     * @return Session
     */
    public function setRangHoraire($rangHoraire)
    {
        $this->rangHoraire = $rangHoraire;

        return $this;
    }

    /**
     * Get rangHoraire
     *
     * @return string 
     */
    public function getRangHoraire()
    {
        return $this->rangHoraire;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Session
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
     * Set horaireDebut
     *
     * @param \DateTime $horaireDebut
     * @return Session
     */
    public function setHoraireDebut($horaireDebut)
    {
        $this->horaireDebut = new \DateTime($horaireDebut);
        return $this;
    }

    /**
     * Get horaireDebut
     *
     * @return \DateTime 
     */
    public function getHoraireDebut()
    {
        return $this->horaireDebut;
        
    }

    /**
     * Set horaireFin
     *
     * @param \DateTime $horaireFin
     * @return Session
     */
    public function setHoraireFin($horaireFin)
    {
        $this->horaireFin = new \DateTime($horaireFin);

        return $this;
    }

    /**
     * Get horaireFin
     *
     * @return \DateTime 
     */
    public function getHoraireFin()
    {
        return $this->horaireFin;
    }
}
