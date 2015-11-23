<?php

namespace Miriade\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
        $form = $this->createCreateForm(new Event());
        if ($this->getRequest()->isMethod("POST")) {
            $data = $this->getRequest()->request->all();
            $data = $this->getRequest()->request->all()['event_eventbundle_event'];
            //var_dump($event);
            //~ var_dump('\n\n');
            //~ var_dump($this->getRequest()->request);
            //~ var_dump('\n\n');
            //~ var_dump($this->getRequest()->request->all());die;
            //var_dump($this->getRequest()->request);die;
            //$form->HandleRequest($this->getRequest());
             $em = $this->getDoctrine()->getManager();
            $event = new Event();
            $event->setTitle($data['title']);
            $event->setDescription($data['description']);
            $event->setStartDate(new \DateTime($data['startDate']));
            $event->setEndDate(new \DateTime($data['endDate']));
            $event->setCity($data['city']);
            $event->setCp($data['cp']);
            $event->setAdress($data['adress']);
            $event->setRdv($data['rdv']);
            $em->persist($event);
            $em->flush();
            return $this->redirect($this->generateUrl('miriade_event_event_dashboard'));
            //var_dump($form);die;
            //~ if ($form->isValid()) {
                //~ var_dump('OK');die;
                //~ $event = $form->getData();
                //~ var_dump($event);die;
                //~ $em->persist($event);
                //~ $em->flush();
//~ 
                //~ return $this->redirect($this->generateUrl('miriade_event_event_dashboard'));
            //~ }
        } else {
            return $this->render('MiriadeEventBundle:Event:new.html.twig', array('form' => $form->createView()));
        }
        
        /*return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );*/

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
