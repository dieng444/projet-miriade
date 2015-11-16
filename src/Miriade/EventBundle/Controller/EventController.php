<?php

namespace Miriade\EventBundle\Controller;

use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Miriade\EventBundle\Entity\Event;
use Miriade\EventBundle\Form\EventType;

class EventController extends Controller
{

    /**
     *
     * @Template()
     */
    public function dashboardAction()
    {
        $em = $this->getDoctrine()->getManager();

        $category = $em->getRepository('MiriadeEventBundle:Event')->findAll();

        return array(
            'category' => $category,
        );
    }

    /**
     * Creates a form to create a Event entity.
     *
     * @param Event $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Event $entity)
    {
        $form = $this->createForm(new EventType(), $entity, array(
            'action' => $this->generateUrl('miriade_event_event_create'),
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
            $entity = new Event();
            $form = $this->createCreateForm($entity);
            return array(
                'entity' => $entity,
                'form' => $form->createView(),
            );
    }

    /**
     * Creates a new Event entity.
     * @Method("POST")
     * @Template("MiriadeEventBundle:Event:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Event();

        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('miriade_event_event_dashboard'));
        }

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }
}