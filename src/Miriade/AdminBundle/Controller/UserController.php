<?php

namespace Miriade\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Miriade\UserBundle\Form\UserType as UserType;
use Symfony\Component\HttpFoundation\Response;

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
        $users = $event->getParticipants();

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

    /**
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function exportCsvAction($idEvent)
    {
        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository('MiriadeEventBundle:Event')->find($idEvent);
        $eventUsers = $event->getParticipants();

        $list = array();
        $list[] = array("Prénom", "Nom", "Nom de l'organisation", "Siret", "Poste occupé", "Adresse", "Code postal", "Ville", "Date d'inscription à l'évènement");

        foreach($eventUsers as $eventUser) {
            $participant = $eventUser->getParticipant();
            $list[] = array(
                        $participant->getFirstName(), 
                        $participant->getLastName(), 
                        $participant->getEnterprise(), 
                        $participant->getSiret(), 
                        $participant->getJob(), 
                        $participant->getAdress(), 
                        $participant->getZipcode(),
                        $participant->getCity(),
                        $eventUser->getDate()->format('d/m/Y H:i:s')
                    );
        }

        $this->utf8_converter($list);

        $handle = fopen('php://memory', 'r+');

        foreach ($list as $fields) {
            fputcsv($handle, $fields);
        }

        rewind($handle);
        $content = stream_get_contents($handle);
        fclose($handle);
        
        return new Response($content, 200, array(
            'Content-Type' => 'application/force-download',
            'Content-Disposition' => 'attachment; filename="'.$event->getSlug().'.csv"'
        ));
    }

    private function utf8_converter($array)
    {
        array_walk_recursive($array, function(&$item, $key){
            if(!mb_detect_encoding($item, 'utf-8', true)){
                    $item = utf8_encode($item);
            }
        });
     
        return $array;
    }
}
