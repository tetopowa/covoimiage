<?php
namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Forms;
use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;

class SettingsController extends Controller{


  /**
  * @Route("/settings", name="settings")
  */

  public function settingsAction(request $request){

    return $this->render('settings/settings.html.twig');
  }

  /**
  * @Route("/set_dark", name="set_dark")
  */

  public function setDarkAction(request $request){
    $user= $this->getDoctrine()
        ->getRepository('AppBundle:User')
        ->findOneBy(array(
          'ID_user' => $this->getUser()->getID_user()
        ));
    $user->setIsActive(false);
    $em = $this->getDoctrine()->getManager();
    $em->persist($user);
    $em->flush();
    return $this->redirectToRoute('homepage');
  }

  /**
  * @Route("/set_normal", name="set_normal")
  */

  public function setNormalAction(request $request){
    $user= $this->getDoctrine()
        ->getRepository('AppBundle:User')
        ->findOneBy(array(
          'ID_user' => $this->getUser()->getID_user()
        ));
    $user->setIsActive(true);
    $em = $this->getDoctrine()->getManager();
    $em->persist($user);
    $em->flush();
    return $this->redirectToRoute('homepage');
  }

}
