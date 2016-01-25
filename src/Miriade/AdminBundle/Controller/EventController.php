<?php

namespace Miriade\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class EventController extends Controller
{
	/**
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function viewAllAction()
    {
    	$repository = $this
			->getDoctrine()
			->getManager()
			->getRepository('MiriadeEventBundle:Event');

		$events = $repository->findAll();

        return $this->render('MiriadeAdminBundle:Event:viewAll.html.twig', array("events" => $events));
    }

    /**
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function deleteAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
    	
    	$repository = $this
			->getDoctrine()
			->getManager()
			->getRepository('MiriadeEventBundle:Event');

		$event = $repository->find($id);

		$em->remove($event);
		$em->flush();

		return $this->redirect($this->generateUrl('miriade_admin_events'));	
    }
}
