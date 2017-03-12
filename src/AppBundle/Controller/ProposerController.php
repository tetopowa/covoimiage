<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Trajet;
use AppBundle\Form\TrajetForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class ProposerController extends Controller
{
    /**
     * @Route("/AddTrajet")
     */
    public function AddTrajetAction(request $request)
    {
        $trajet = new Trajet();
        $form = $this->createForm(TrajetForm::class, $trajet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /*$em = $this->getDoctrine()->getEntityManager();
            $em->persist($trajet);
            //$em->flush();*/
            return $this->redirectToRoute('homepage');
        }

        return $this->render('proposer/proposer.html.twig', array(
            'form' => $form->createView(),
            'error' => null,
        ));
    }
    /**
    *@Route("/AddTrajet")
    *
    */
    public function AddTrajetDB(){
      echo "pdpdpdp";
    }

}
