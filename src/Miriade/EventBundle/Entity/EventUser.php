<?php

namespace Miriade\EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EventUser
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Miriade\EventBundle\Entity\EventUserRepository")
 */
class EventUser
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="Miriade\EventBundle\Entity\Event", inversedBy="participants")
     * @ORM\JoinColumn(nullable=false)
     */
    private $event;

    /**
     * @ORM\ManyToOne(targetEntity="Miriade\UserBundle\Entity\User", inversedBy="events")
     * @ORM\JoinColumn(nullable=false)
     */
    private $participant;

    public function __construct() {
        $this->date = new \DateTime();
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
     * Set date
     *
     * @param \DateTime $date
     * @return EventUser
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set event
     *
     * @param \Miriade\EventBundle\Entity\Event $event
     * @return EventUser
     */
    public function setEvent(\Miriade\EventBundle\Entity\Event $event)
    {
        $this->event = $event;
        $event->addParticipant($this);
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
     * Set participant
     *
     * @param \Miriade\UserBundle\Entity\User $participant
     * @return EventUser
     */
    public function setParticipant(\Miriade\UserBundle\Entity\User $participant)
    {
        $this->participant = $participant;
        $participant->addEvent($this);
        return $this;
    }

    /**
     * Get participant
     *
     * @return \Miriade\UserBundle\Entity\User 
     */
    public function getParticipant()
    {
        return $this->participant;
    }
}
