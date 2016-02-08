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
    public function viewAllAction()
    {
    	$repository = $this
			->getDoctrine()
			->getManager()
			->getRepository('MiriadeUserBundle:User');

		$users = $repository->findAll();

        return $this->render('MiriadeAdminBundle:User:viewAll.html.twig', array("users" => $users));
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
			->getRepository('MiriadeUserBundle:User');

		$user = $repository->find($id);

		$em->remove($user);
		$em->flush();

		return $this->redirect($this->generateUrl('miriade_admin_users'));	
    }

    /**
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function updateAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('MiriadeUserBundle:User');

        $user = $repository->find($id);

        $form = $this->get('form.factory')->create(new UserType, $user);

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirect($this->generateUrl('miriade_admin_users'));
        }

        return $this->render('MiriadeAdminBundle:User:update.html.twig', array('form' => $form->createView())); 
    }
}
