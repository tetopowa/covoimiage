<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Participer;
use AppBundle\Form\ParticiperForm;
use Symfony\Component\HttpFoundation\Request;

/**
*
*/
class ParticiperController extends Controller
{
  /**
  * @Route("/participer/", name="participer_trajet")
  */
  public function addReservationAction($id, $nbPlaces)
  {
    $em = $this->getDoctrine()->getManager();
    return $this->redirect($this->generateUrl('my_reservations'));

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
