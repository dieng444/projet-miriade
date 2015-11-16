<?php

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
        return $this->render('MiriadeEventBundle:Event:addEvent.html.twig', array());
    }
}
