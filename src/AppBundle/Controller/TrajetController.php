<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Trajet;
use AppBundle\Form\TrajetForm;
use AppBundle\Form\seekTrajetForm;
use AppBundle\Repository\TrajetRepository;
use Symfony\Component\HttpFoundation\Request;

class TrajetController extends Controller
{


  /**
   * @Route("/trajet/add", name="add_trajet")
   */
  public function AddTrajetAction(request $request)
  {
      $trajet = new Trajet();
      $userid = $this->getUser()->getID_user();
      $trajet->setIDConducteur($userid);
      $form = $this->createForm(TrajetForm::class, $trajet);
      $form ->handleRequest($request);
      if ($form->isValid()) {
          $em = $this->getDoctrine()->getEntityManager();
          $em->persist($trajet);
          $em->flush();
          return $this->redirect($this->generateUrl('homepage'));
      }

      return $this->render('trajet/proposer.html.twig', array(
          'form' => $form->createView(),
          'error' => null,
      ));
  }

    /**
     * @Route("/trajet/id:{id}", name="trajet_show")
     */
    public function loadTrajetAction($id){
      //$trajet = new Trajet();
      $em = $this->getDoctrine()->getRepository('AppBundle:Trajet');
      $trajet = $em->findOneBy(
       array('ID_trajet' => $id)
      );
      // $trajet = $em->getTrajetFromId($id);

      return $this->render('trajet/trajet.html.twig', array(
        'trajet' => $trajet,
        'userID' => $this->getUser()->getID_user()
      ));
    }

    /**
     * @Route("/trajet/{dep}/{dest}/{date}", name="trajet_complete_research", requirements={"dep"=".+","dest"=".+"})
     */
     //, requirements={"dep"=".+","dest"=".+"}
     public function loadSeekTrajetAction($dep,$dest,$date){

       $em = $this->getDoctrine()->getRepository('AppBundle:Trajet');

       $datas = $em->loadValidTrajet($dep,$dest,$date);
       return $this->render('trajet/restrajet.html.twig', array(
        'trajets' => $datas,
        'titre' => 'Liste des annonces'
       ));
     }

     /**
      * @Route("/my_trajets", name="my_trajets")
      */
      public function loadMyTrajets(request $request){
        $userid = $this->getUser()->getID_user();
        $em = $this->getDoctrine()->getRepository('AppBundle:Trajet');
        $trajets = $em->findBy(
          array('ID_conducteur' => $userid)
        );
        return $this->render('trajet/restrajet.html.twig', array(
          'trajets' => $trajets,
          'titre' => 'Mes annonces'
        ));
      }
      /**
       * @Route("/delete_trajet/{id}", name="delete_trajet")
       */
      public function deleteTrajetAction($id){
        $userid = $this->getUser()->getID_user();
        $em = $this->getDoctrine()->getRepository('AppBundle:Trajet');
        $trajet = $em -> findBy(
          array('ID_trajet'=> $id)
        );
        if ($trajet['ID_conducteur'] == $userid) {
          $error = 'Vous ne pouvez pas supprimer ce trajet';
        }
        else {
          $success = 'Trajet supprimé avec succès';
        }

        $this->render('my_trajets', array(
          'error' => $error,
          'success' => $success
        ));
      }
}
