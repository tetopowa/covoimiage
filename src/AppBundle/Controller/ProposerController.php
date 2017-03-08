<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ProposerController extends Controller
{
    /**
     * @Route("/AddTrajet")
     */
    public function AddTrajetAction()
    {
        return $this->render('proposer/proposer.html.twig', array(
            // ...
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
