<?php

namespace Miriade\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Miriade\EventBundle\Entity\Session;
use Miriade\EventBundle\Form\SessionType;

class SessionController extends Controller
{

    /**
     *
     * @Template()
     */
    public function dashboardAction()
    {
        $em = $this->getDoctrine()->getManager();

        $partner = $em->getRepository('MiriadeEventBundle:Session')->findAll();

        return array(
            'partner' => $partner,
        );
    }

    /**
     * Creates a form to create a Session entity.
     *
     * @param Session $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Session $entity)
    {
        $form = $this->createForm(new SessionType(), $entity, array(
            'action' => $this->generateUrl('miriade_event_session_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Créer une session'));

        return $form;
    }

    /**
     * Displays a form to create a new Session entity.
     *
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Session();
        $form = $this->createCreateForm($entity);
        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Creates a new Session entity.
     * @Method("POST")
     * @Template("MiriadeEventBundle:Session:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Session();

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
