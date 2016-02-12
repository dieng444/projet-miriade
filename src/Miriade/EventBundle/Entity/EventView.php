<?php

namespace Miriade\EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EventView
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Miriade\EventBundle\Entity\EventViewRepository")
 */
class EventView
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
     * @ORM\Column(name="viewDate", type="datetime")
     */
    private $viewDate;

    /**
     * @var String
     *
     * @ORM\Column(name="userIp", type="string", length=150)
     */
    private $userIp;
    
    /**
     * @ORM\ManyToOne(targetEntity="Miriade\EventBundle\Entity\Event", inversedBy="views")
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
     * Set viewDate
     *
     * @param \DateTime $viewDate
     * @return EventView
     */
    public function setViewDate($viewDate)
    {
        $this->viewDate = $viewDate;

        return $this;
    }

    /**
     * Get viewDate
     *
     * @return \DateTime
     */
    public function getViewDate()
    {
        return $this->viewDate;
    }

    /**
     * Set event
     *
     * @param \Miriade\EventBundle\Entity\Event $event
     * @return EventView
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
     * Set userIp
     *
     * @param string $userIp
     * @return EventView
     */
    public function setUserIp($userIp)
    {
        $this->userIp = $userIp;

        return $this;
    }

    /**
     * Get userIp
     *
     * @return string 
     */
    public function getUserIp()
    {
        return $this->userIp;
    }
}
