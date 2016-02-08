<?php

namespace Miriade\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DefaultController extends Controller
{
    public function homeAction()
    {
    	$em = $this->getDoctrine()->getManager();
        $events = $em->getRepository('MiriadeEventBundle:Event')->findAll();
        $events = array_reverse($events);
        if(count($events) > 0)
        	return new RedirectResponse($this->generateUrl('miriade_event_home', array("id" => $events[0]->getId())));
    }
}
