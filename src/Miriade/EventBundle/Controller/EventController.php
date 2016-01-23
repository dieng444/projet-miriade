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
use Miriade\EventBundle\Entity\Session;
use Miriade\EventBundle\Entity\Partner;
use Miriade\EventBundle\Form\EventType;

class EventController extends Controller
{

    /**
     * @Template()
     */
    public function dashboardAction()
    {
        $em = $this->getDoctrine()->getManager();
        $events = $em->getRepository('MiriadeEventBundle:Event')->findAll();
        return array(
            'events' => $events,
        );
    }
    /**
     * @Template()
     */
    public function homeAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        //$events = $em->getRepository('MiriadeEventBundle:Event')->findAll();
        $event = $em->getRepository('MiriadeEventBundle:Event')->find($id);

        return $this->render('MiriadeEventBundle:Event:show.html.twig', array('event' => $event));
    }
    /**
     * Displays a form to create a new Categorie entity.
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $event = new Event();
        $em = $this->getDoctrine()->getManager();
        $partner = new Partner();

        $form = $this->CreateForm(new EventType(), $event);
        if ($this->getRequest()->isMethod("POST")) {
            $data = $this->getRequest()->request->all();
            $nbSession = (int) $data['nbSession'];
            $listSession = array();
            //var_dump($data);die;
            if ($nbSession > 0) {
                for ($i=1; $i <= $nbSession ; $i++) {
                      $session = new Session();
                      $session->setName(trim(strip_tags($data['session_'.$i]['tile'])));
                      $session->setHoraireDebut($data['session_'.$i]['horaireDebut']);
                      $session->setHoraireFin($data['session_'.$i]['horaireFin']);
                      $session->setDescription(trim(strip_tags($data['session_'.$i]['desc'])));
                      //$listSession[] = $session;
                      $em->persist($session);
                }
            }
            //Les part�naires
            $partner->setName(trim(strip_tags($data['partner_name'])));
            $partner->setAddress(trim(strip_tags($data['partner_address'])));
            $partner->setCity(trim(strip_tags($data['partner_city'])));
            $partner->setCp((int)trim(strip_tags($data['partner_cp'])));
            $partner->setEmail(trim(strip_tags($data['partner_email'])));
            $partner->setPhone(trim(strip_tags($data['partner_phone'])));
            $partner->setLogo("_none");
			$form->HandleRequest($this->getRequest());
			//var_dump($this->getRequest());die;

            if(isset($_FILES['event_eventbundle_event']) &&
				strlen($_FILES['event_eventbundle_event']['name']['image']) > 0 ) {
				$image = $_FILES['event_eventbundle_event'];
				if($event->uploadImage($image))
					$event->setImage($event->getImage());
			} else
				  $event->setImage("_none");

			if(isset($_FILES['partner_logo']) &&
				strlen($_FILES['partner_logo']['name']) > 0 ) {
				$logo = $_FILES['partner_logo'];
				//var_dump($log
				if($partner->uploadLogo($logo))
					$partner->setLogo($partner->getLogo());
			} else
				  $partner->setLogo("_none");

      $event->setPartner($partner);
      $event->setSession($session);

			$em->persist($event);
			$em->flush();
			return $this->render('MiriadeEventBundle:Event:new.html.twig', array('form' => $form->createView()));
            //~ if ($form->isValid()) {
                //~ return $this->redirect($this->generateUrl('miriade_event_event_dashboard'));
            //~ } else {
				//~ return $this->render('MiriadeEventBundle:Event:new.html.twig', array('form' => $form->createView()));
			//~ }
        } else {
            return $this->render('MiriadeEventBundle:Event:new.html.twig', array('form' => $form->createView()));
        }
    }
	/**
     * Trouve et affiche les informations d'un �v�nement enregistr� dans la base de données.
     *
     * @Method("GET")
     * @Template()
     */
    public function showAction(Request $request, $id)
    {

        $event = $em->getEvent($id);
        if (!$event) {
            throw $this->createNotFoundException('Impossible de trouver l\'événement demandé.');
        }

        return array(
            'events' => $event
        );
	}

	public function programAction($id)
	{
		$event = $this->getEvent($id);
		return $this->render('MiriadeEventBundle:Event:program.html.twig', array('var' => "Programme ".$id,"event" => $event));
	}
	public function aboutAction($id)
	{
		$event = $this->getEvent($id);
		return $this->render('MiriadeEventBundle:Event:about.html.twig', array('var' => "About ".$id,"event" => $event));
	}
	public function mapAction($id)
	{
		$event = $this->getEvent($id);
		return $this->render('MiriadeEventBundle:Event:map.html.twig', array('var' => "map ".$id,"event" => $event));
	}
	private function getEvent($id)
	{
		$em = $this->getDoctrine()->getManager();
        $event = $em->getRepository('MiriadeEventBundle:Event')->find($id);

        return $event;
	}
	public function contactAction($id)
	{
		$em = $this->getDoctrine()->getManager();
        $event = $em->getRepository('MiriadeEventBundle:Event')->find($id);

		return $this->render('MiriadeEventBundle:Event:contact.html.twig', array('var' => "contact".$id,"event" => $event));
	}
}
