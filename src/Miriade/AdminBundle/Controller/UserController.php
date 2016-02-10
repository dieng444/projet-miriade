<?php

namespace Miriade\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Miriade\UserBundle\Form\UserType as UserType;

class UserController extends Controller
{
	/**
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function viewAllEventsAction()
    {
        $em = $this->getDoctrine()->getManager();

		$events = $em->getRepository('MiriadeEventBundle:Event')->findAll();

        return $this->render('MiriadeAdminBundle:User:viewAllEvents.html.twig', array("events" => $events));
    }

    /**
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function viewAllEventsUsersAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $event = $em->getRepository('MiriadeEventBundle:Event')->find($id);
        $users = $em->getRepository('MiriadeUserBundle:User')->findAll();

        return $this->render('MiriadeAdminBundle:User:viewAll.html.twig', array("event" =>$event, "users" => $users));
    }

    /**
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function deleteAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
    	
    	$repository = $em->getRepository('MiriadeUserBundle:User');

		$user = $repository->find($id);

		$em->remove($user);
		$em->flush();

		return $this->redirect($this->generateUrl('miriade_admin_users'));	
    }

    /**
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function updateAction($idEvent, $idUser, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository('MiriadeUserBundle:User')->find($idUser);
        $event = $em->getRepository('MiriadeEventBundle:Event')->find($idEvent);

        $form = $this->get('form.factory')->create(new UserType, $user);

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirect($this->generateUrl('miriade_admin_users_events_users', array("id" => $idEvent)));
        }

        return $this->render('MiriadeAdminBundle:User:update.html.twig', array('form' => $form->createView())); 
    }
}
