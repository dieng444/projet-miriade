<?php

<<<<<<< HEAD
namespace Miriade\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MiriadeEventBundle:Default:index.html.twig', array('name' => $name));
    }
    public function addEventAction($name)
    {
        return $this->render('MiriadeEventBundle:Default:index.html.twig', array('name' => $name));
    }
}
=======
namespace Carto\FicheBundle\Controller;

use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Carto\FicheBundle\Entity\Event;
use Carto\FicheBundle\Form\EventType;

class EventController extends Controller
{
    /**
     * Creates a form to create a Fiche entity.
     *
     * @param Fiche $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Event $entity)
    {
        $form = $this->createForm(new EventType(), $entity, array(
            'action' => $this->generateUrl('event_event_event_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Créer un événement'));

        return $form;
    }

    /**
     * Displays a form to create a new Categorie entity.
     *
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
            if ($this->getUser()->getFiche() == null) {
                $owner_fiche_exist = false;
                $entity = new Event();
                $form = $this->createCreateForm($entity);
                return array(
                    'entity' => $entity,
                    'form' => $form->createView(),
                );
            } else {
                return $this->render("EventEventBundle:Event:erreur.html.twig", array("id" => $this->getUser()->getFiche()->getId()));
            }
    }
}
>>>>>>> 70391704d8a05051227a067ec699517cceb73051
