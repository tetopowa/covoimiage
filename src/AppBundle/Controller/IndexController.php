<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\seekTrajetForm;

class IndexController extends Controller
{
    /**
     * @Route("/", name="homepage")
	   *
     */
    public function indexAction(Request $request)
    {

      $form = $this->createForm(seekTrajetForm::class);
      $form ->handleRequest($request);
      if ($form->isSubmitted()) {
          $datas = $form->getData();

          return $this->redirect($this->generateUrl('trajet_complete_research', array(
            'dep'=>$datas['IDvilledep'],
            'dest'=>$datas['IDvillefin'],
            'date'=> $datas['date']
          )));

      }

      return $this->render('index/index.html.twig', array(
          'form' => $form->createView(),
          'error' => null,
      ));

    }
}
