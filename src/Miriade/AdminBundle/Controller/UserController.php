<?php

namespace Miriade\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

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
}
