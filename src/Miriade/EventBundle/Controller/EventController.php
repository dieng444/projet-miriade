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
        $form = $this->CreateForm(new EventType(), $event);
        if ($this->getRequest()->isMethod("POST")) {
            $data = $this->getRequest()->request->all();
            $nbSession = (int) $data['nbSession'];
            $nbPartner = (int) $data['nbPartner'];
            /*Upload de l'image de l'événement*/
          $form->HandleRequest($this->getRequest());
           if(isset($_FILES['event_eventbundle_event']) &&
   			    strlen($_FILES['event_eventbundle_event']['name']['image']) > 0 ) {
               $image = $_FILES['event_eventbundle_event'];
               if($event->uploadImage($image)) {
                 $event->setImage($event->getImage());
               } else
     					     $event->setImage("_none");
     			} else
     				  $event->setImage("_none");
            /*
            $nbSession est capté depuis la validation du formulaire, c'est le nombre de session qui a été
            l'admin à l'événement courant.
            les sessions sont nommées dynamiquement de cette façon en js : session_x[name],partner_x[address]...
            avec x qui varie à chaque appel à la function addSession en js
            donc onse base sur le même principe pour créer au tant de sessions qu'il en a été creé en js
            */
        if ($nbSession > 0) {
            for ($i=1; $i <= $nbSession ; $i++) {
                  $session = new Session();
                  $session->setName(trim(strip_tags($data['session_'.$i]['title'])));
                  $session->setHoraireDebut($data['session_'.$i]['horaireDebut']);
                  $session->setHoraireFin($data['session_'.$i]['horaireFin']);
                  $session->setDescription(trim(strip_tags($data['session_'.$i]['desc'])));
                  $session->setEvent($event); //Liaison entre l'événement et la session
                  $em->persist($session); //On persist chaque session pour une insertion globale après
            }
        }
        /*
        nbPartner est capté depuis la validation du formulaire, c'est le nombre de partnaire qui a été
        l'admin à l'événement courant.
        les partnaires sont nommés dynamiquement de cette façon en js : partner_x[name],partner_x[address]...
        avec x qui varie à chaque appel à la function addPartner en js
        donc onse base sur le même principe pour créer au tant de partnaires qu'il en a été creé en js
        */
        if ($nbPartner  > 0) {
          for ($i=1; $i <= $nbPartner; $i++) {
              $partner = new Partner();
              $partner->setName(trim(strip_tags($data['partner_'.$i]['name'])));
              $partner->setAddress(trim(strip_tags($data['partner_'.$i]['address'])));
              $partner->setCity(trim(strip_tags($data['partner_'.$i]['city'])));
              $partner->setCp((int)trim(strip_tags($data['partner_'.$i]['cp'])));
              $partner->setEmail(trim(strip_tags($data['partner_'.$i]['email'])));
              $partner->setPhone(trim(strip_tags($data['partner_'.$i]['phone'])));
              $partner->setLogo("_none");
              $partner->setEvent($event);//Liaison entre l'événement et le partenaire courant
              $em->persist($partner); //On persist chaque partenaire pour une insertion globale après
          }
        }
        /*Upload du logo des partenaires*/
			if(isset($_FILES['partner_logo']) &&
				strlen($_FILES['partner_logo']['name']) > 0 ) {
				$logo = $_FILES['partner_logo'];
				if($partner->uploadLogo($logo))
					$partner->setLogo($partner->getLogo());
			} else
				  $partner->setLogo("_none");

			$em->persist($event);
			$em->flush();
			return $this->render('MiriadeEventBundle:Event:new.html.twig', array('form' => $form->createView()));

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
