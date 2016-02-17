<?php

namespace Miriade\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Miriade\EventBundle\Entity\Event;
use Miriade\EventBundle\Entity\Session;
use Miriade\EventBundle\Entity\Partner;
use Miriade\EventBundle\Form\EventType;
use Miriade\EventBundle\Form\SessionType;
use Miriade\EventBundle\Form\PartnerType;
use Miriade\EventBundle\Entity\EventUser as EventUser;
use Miriade\EventBundle\Entity\EventView;

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
     * Trouve et affiche les informations d'un evenement enregistre dans la bdd.
     * @Template()
     */
    public function homeAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository('MiriadeEventBundle:Event')->findOneBy(
            array('slug' => $slug)
        );
        $this->get('session')->set('currentEvent', $event);
        $partners = $em->getRepository('MiriadeEventBundle:Partner')->findBy(array('event' => $event->getId()));

        $dateNow = time();
        $dateLimit = str_replace('/', '-', $event->getLimitDate());
        $dateLimit = date('Y-m-d', strtotime($dateLimit));
        $dateLimit = strtotime($dateLimit);

        $isExpired = false;
        if($dateNow > $dateLimit) {
            $isExpired = true;
        }
        $eventStats = $this->getEventStats($event,$em);
        //var_dump($statsView);die;
        //var_dump($this->getUserIP());die;

        $user = $this->getUser();
        $eventUser = $em->getRepository('MiriadeEventBundle:EventUser')->findOneBy(
            array('event' => $event, 'participant' => $user)
        );

        $isInscrit = false;
        if($eventUser != null) {
          $isInscrit = true;
        }

        return $this->render('MiriadeEventBundle:Event:show.html.twig',
                              array('event' => $event, 'partners' => $partners,
                                    'isExpired' => $isExpired, 'isInscrit' => $isInscrit, 'eventStats' => $eventStats));
    }
    /**
    * Permet de gérer le nombre de vue d'un événement
    * @return array
    ***/
    public function getEventStats($event,$em) {
      //Récupèration de la liste des vues de l'événement
      $eventViews = $event->getViews();
      $ipsTable = array();
      /*
      * Liste des adresses ip des anciens visiteurs, pour éviter que
      * le même visiteur recharge la page plusieurs fois
      **/
      if (sizeof($eventViews) > 0) {
          foreach ($eventViews as $eventView)
            $ipsTable[] = $eventView->getUserIP();
      }
      if (!in_array($this->getUserIP(),$ipsTable)) {
          $eventView = new eventView();
          $eventView->setEvent($event); //Lévénement vue
          $eventView->setViewDate(new \DateTime("now")); //Date de la visite
          $eventView->setUserIp($this->getUserIP());
          $em->persist($eventView);
          $em->flush();
      }
      
      $nbViewBeforeEvent = 0; //nb de vue avant l'événement
      $nbViewAfterEvent = 0; //nb de vue après l'événement

      if (sizeof($eventViews) > 0) {
        foreach ($eventViews as $eventView) {
          $viewDate = $eventView->getViewDate()->format('Y-m-d');
          $evenEndDate = str_replace('/','-',$event->getEndDate());
          $evenEndDate = date('Y-m-d',strtotime($evenEndDate));
          if ($evenEndDate > $viewDate)
              $nbViewBeforeEvent++;
          else
              $nbViewAfterEvent++;
        }
      }
      $eventStats = array(
                          'nbViewBeforeEvent' => $nbViewBeforeEvent,
                          'nbViewAfterEvent' => $nbViewAfterEvent
                        );

      return $eventStats;
    }
    /**
    * Renvoie l'adresse ip de l'utilisateur courant
    * @return $ip : l'ip de l'utilisateur
    ***/
    public function getUserIP()
    {
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
            $ip = $client;
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
            $ip = $forward;
        else
            $ip = $remote;

        return $ip;
    }
    /**
     * Persiste un événement en BDD et redirige vers le formulaire des sessions
     * @Method("POST")
     */
    public function newAction()
    {
        $event = new Event();
        $em = $this->getDoctrine()->getManager();
        $form = $this->CreateForm(new EventType(), $event);

        if ($this->getRequest()->isMethod("POST")) {
            $form->HandleRequest($this->getRequest());
            if(isset($_FILES['event_eventbundle_event']) && strlen($_FILES['event_eventbundle_event']['name']['image']) > 0 ) {
                $image = $_FILES['event_eventbundle_event'];
                if($event->uploadImage($image)) {
                    $event->setImage($event->getImage());
                } else
                    $event->setImage("_none");
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();

            $this->get('session')->set('currentEvent', $event);

            return $this->redirect($this->generateUrl('miriade_event_new_session', array ('id' => $event->getId())));
        }

        return $this->render('MiriadeEventBundle:Event:newEvent.html.twig', array('form' => $form->createView()));

    }

    /**
     * Persiste le tableau des sessions en BDD et redirige vers le formulaire des partenaires
     * @Method("POST")
     */
    public function newSessionAction($id)
    {
        $session = new Session();
        $em = $this->getDoctrine()->getManager();
        $form = $this->CreateForm(new SessionType(), $session);
        if ($this->getRequest()->isMethod("POST")) {
            $data = $this->getRequest()->request->all();
            $nbSession = (int) $data['nbSession'];
            //$event = $this->get('session')->get('currentEvent');
            $event = $em->getRepository('MiriadeEventBundle:Event')->find($id);

            if ($nbSession > 0) {
                for ($i=1; $i <= $nbSession ; $i++) {
                    //$form->HandleRequest($this->getRequest());

                    $session = new Session();
                    $session->setName(trim(strip_tags($data['session_'.$i]['title'])));
                    $session->setHoraireDebut($data['session_'.$i]['horaireDebut']);
                    $session->setHoraireFin($data['session_'.$i]['horaireFin']);
                    $session->setDescription(trim(strip_tags($data['session_'.$i]['desc'])));
                    $session->setEvent($event); //Liaison entre l'événement et la session
                    $em->persist($session); //On persist chaque session pour une insertion globale après
                }
            }
            $em->flush();

            return $this->redirect($this->generateUrl('miriade_event_new_partenaire', array ('id' => $id)));
        } else {
            return $this->render('MiriadeEventBundle:Event:newSession.html.twig', array('form' => $form->createView(), 'id' => $id));
        }
    }

    /**
     * Persiste le tableau des partenares en BDD
     * @Method("POST")
     */
    public function newPartenaireAction($id) {
        $partner = new Partner();
        $em = $this->getDoctrine()->getManager();
        $form = $this->CreateForm(new PartnerType(), $partner);
        if ($this->getRequest()->isMethod("POST")) {
            $data = $this->getRequest()->request->all();
            $nbPartner = (int) $data['nbPartner'];
            //$event = $this->get('session')->get('currentEvent');
            $event = $em->getRepository('MiriadeEventBundle:Event')->find($id);
            if ($nbPartner  > 0) {
                for ($i=1; $i <= $nbPartner; $i++) {
                    $partner = new Partner();
                    $partner->setLibelle(trim(strip_tags($data['partner_'.$i]['libelle'])));
                    $partner->setNameContact(trim(strip_tags($data['partner_'.$i]['nameContact'])));
                    $partner->setAddress(trim(strip_tags($data['partner_'.$i]['address'])));
                    $partner->setCity(trim(strip_tags($data['partner_'.$i]['city'])));
                    $partner->setCp((int)trim(strip_tags($data['partner_'.$i]['cp'])));
                    $partner->setEmail(trim(strip_tags($data['partner_'.$i]['email'])));
                    $partner->setPhone(trim(strip_tags($data['partner_'.$i]['phone'])));
                    $partner->setStatut(trim(strip_tags($data['event_eventbundle_event']['statut'])));

                    if(isset($_FILES['event_eventbundle_event']) && strlen($_FILES['event_eventbundle_event']['name']['logo']) > 0 ) {
                        $logo = $_FILES['event_eventbundle_event'];
                        if($partner->uploadLogo($logo))
                            $partner->setLogo($partner->getLogo());
                    } else {
                        $partner->setLogo("_none");
                    }
                    $partner->setEvent($event);//Liaison entre l'événement et le partenaire courant
                    $em->persist($partner); //On persist chaque partenaire pour une insertion globale après
                }
            }
            $em->flush();

            return $this->redirect($this->generateUrl('miriade_event_home', array('slug' => $event->getSlug())));
        } else {
            return $this->render('MiriadeEventBundle:Event:newPartenaire.html.twig', array('form' => $form->createView(), 'id' => $id));
        }
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
        $partners = $em->getRepository('MiriadeEventBundle:Partner')->findBy(array('event' => $id));

		return $this->render('MiriadeEventBundle:Event:contact.html.twig', array('var' => "contact".$id,"event" => $event, 'partners' => $partners));
	}

    /**
     * @Security("has_role('ROLE_PARTICIPANT')")
     */
    public function participationAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        $event = $em->getRepository('MiriadeEventBundle:Event')->findOneBy(array('slug' => $slug));

        $dateNow = time();
        $dateLimit = str_replace('/', '-', $event->getLimitDate());
        $dateLimit = date('Y-m-d', strtotime($dateLimit));
        $dateLimit = strtotime($dateLimit);

        if($dateNow > $dateLimit) {
             return $this->render('MiriadeEventBundle:Event:participationExpired.html.twig', array('event' => $event));
        }

        $eventUser = $em->getRepository('MiriadeEventBundle:EventUser')->findBy(array('participant' => $user, 'event' => $event));

        if(count($eventUser) > 0) {
            return $this->render('MiriadeEventBundle:Event:participationError.html.twig', array('event' => $event));
        } else {
            $eventUser = new EventUser();
            $eventUser->setParticipant($user);
            $eventUser->setEvent($event);

            $em->persist($eventUser);
            $em->flush();

            return $this->redirect($this->generateUrl('miriade_event_show', array('slug' => $slug)));
        }
    }
}
