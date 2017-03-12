<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Personne;
use AppBundle\Form\PersonneForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Repository\UserRepository;
use Symfony\Component\HttpKernel\Profiler\Profile;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
class ProfileController extends Controller
{
    /**
     * @Route("/initprofile", name="profile")
     * @Security("has_role('ROLE_USER')")
     */
    public function newProfileAction(request $request)
    {
        $pers = new Personne();
        $error = null;
        $em = $this->getDoctrine()->getManager();
        $userid = $this->getUser()->getID_user();
        $pers1 = $em->getRepository('AppBundle:Personne')->loadProfile($userid);
        if ($pers1) {
            return $this->showProfileAction($pers1);
        }
        $form = $this->createForm(PersonneForm::class, $pers);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $pers->setIDPersonne($userid);
            $em->persist($pers);
            $em->flush();
        }

        return $this->render('Profile/FillIn.html.twig', array(
            'form' => $form->createView(),
            'error' => $error,
        ));
    }

    /**
     * @Route("/myprofile", name="myProfile")
     * @Security("has_role('ROLE_USER')")
     */
    public function showProfileAction(Personne $personne)
    {
        return $this->render('Profile/showProfile.html.twig', array(
            'profile' => $personne,
            'error' => null,
        ));
        //HANDLING MODIFY FORM
    }

    /**
     * @Route("/modifyprofile", name="modifyProfile")
     * @Security("has_role('ROLE_USER')")
     */
    public function modifyProfileAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $userid = $this->getUser()->getID_user();
        $profile = $em->getRepository('AppBundle:Personne')->loadProfile($userid);
        $form = $this->createForm(PersonneForm::class, $profile);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $profile->setIDPersonne($userid);
            $em->persist($profile);
            $em->flush();
            return $this->showProfileAction($profile);
        }

        return $this->render('Profile/FillIn.html.twig', array(
            'form' => $form->createView(),
            'error' => null,
        ));
    }
}
        //HANDLING MODIFY FORM