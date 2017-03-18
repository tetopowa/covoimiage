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
      $em = $this->getDoctrine()->getRepository('AppBundle:Trajet');
      $trajet = $em->findOneBy(
       array('ID_trajet' => $id)
      );

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
        $error=null;
        $sucess=null;
        $userid = $this->getUser()->getID_user();
        $seek = $this->getDoctrine()->getRepository('AppBundle:Trajet');
        $em = $this->getDoctrine()->getEntityManager();
        $trajet = $seek -> findOneBy(
          array('ID_trajet'=> $id)
        );
        if ($trajet->getID_Conducteur() == $userid) {
          $em->remove($trajet);
          $em->flush();
          return $this->redirectToRoute('my_trajets',array(
            'success' => 'Le trajet a bien été supprimé'
          ));
        }else {
          return $this->redirectToRoute('my_trajets', array(
            'error' => 'Erreur lors de la suppression'
          ));
        }
      }

        /**
         * @Route("/modify_trajet/{id}", name="modify_trajet")
         */
        public function modifyTrajetAction($id){
          $error=null;
          $sucess=null;
          $userid = $this->getUser()->getID_user();
          $seek = $this->getDoctrine()->getRepository('AppBundle:Trajet');
          $em = $this->getDoctrine()->getEntityManager();
          $trajet = $seek -> findOneBy(
            array('ID_trajet'=> $id)
          );
          if ($trajet->getID_Conducteur() == $userid) {
            
            return $this->redirectToRoute('my_trajets',array(
              'success' => 'Le trajet a bien été supprimé'
            ));
          }else {
            return $this->redirectToRoute('my_trajets', array(
              'error' => 'Erreur lors de la suppression'
            ));
          }

      }
}
