<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Participer;
use AppBundle\Entity\Trajet;
use AppBundle\Form\ParticiperForm;
use Symfony\Component\HttpFoundation\Request;

/**
*
*/
class ParticiperController extends Controller
{

  /**
  * @Route("/reserver/{idtrajet}/{idpersonne}/{nbplaces}", name="reserv")
  */
  public function addReservationAction($idtrajet,$idpersonne,$nbplaces)
  {
    $participer = new Participer();
    $participer->setIDPersonne($idpersonne);
    $participer->setNbplaces($nbplaces);
    $participer->setIDTrajet($idtrajet);
    $em = $this->getDoctrine()->getManager();
    $em->persist($participer);
    $em->flush();
    $trajet = $em->getRepository('AppBundle:Trajet')->findOneBy(array(
      'ID_trajet'=> $idtrajet
    ));
    $trajet->setNbplaces($trajet->getNbPlaces()-1);
    $em->flush();
    return $this->redirectToRoute('my_reservations');
  }

  /**
  * @Route("/my_reservations", name="my_reservations")
  */
  public function loadMyReservationAction(request $request)
  {
    $trajets = array();
    $userid = $this->getUser()->getID_user();
    $em = $this->getDoctrine();
    $reservations = $em->getRepository('AppBundle:Participer')->findBy(
      array('ID_personne' => $userid)
    );
    foreach ($reservations as $rsv) {
      $trajet = $em->getRepository('AppBundle:Trajet')->findOneBy(
        array('ID_trajet' => $rsv->getIDTrajet())
      );
      array_push($trajets,$trajet);
    }
    return $this->render('trajet/restrajet.html.twig', array(
      'trajets' => $trajets,
      'titre' => 'Mes réservations'
    ));
  }


}
