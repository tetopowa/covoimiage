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

  public function setSettingsAction(request $request){
    $form = $this->createFormBuilder()
    ->add('language', CheckboxType::class, array(
      'label'    => 'Anglais (si non coché : français): ',
      'required' => false
    ))
    ->add('darktheme', CheckboxType::class, array(
      'label'=> 'Thème dark: ',
      'required' => false
    ))
    ->getForm();
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $data = $form->getData();

      return $this->render('settings/settings.html.twig');
    }
    return $this->render('settings/settings.html.twig',array(
      'form' => $form->createView()
    ));
  }

}
