<?php

namespace Miriade\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Miriade\UserBundle\Form\UserProfilType as UserProfilType;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
	/**
     * @Security("has_role('ROLE_PARTICIPANT')")
     */
    public function viewAction()
    {
    	$user = $this->getUser();
      //$event  = $this->get('session')->get("currentEvent");
      //var_dump($event);die;
      return $this->render('MiriadeUserBundle:User:view.html.twig', array('user' => $user));
    }

    /**
     * @Security("has_role('ROLE_PARTICIPANT')")
     */
    public function updateAction(Request $request)
    {
    	$user = $this->getUser();

        $form = $this->get('form.factory')->create(new UserProfilType, $user);

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirect($this->generateUrl('miriade_user_profil'));
        }

        return $this->render('MiriadeUserBundle:User:update.html.twig', array('form' => $form->createView()));
    }
}
