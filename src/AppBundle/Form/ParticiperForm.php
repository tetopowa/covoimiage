<?php

namespace AppBundle\Form;

use AppBundle\Entity\Participer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
*
*/
class ParticiperForm extends AbstractType
{

  public function buildForm(FormBuilderInterface $builder, array $options){
    $builder
    ->add('_ID_trajet',HiddenType::class)
    ->add('_ID_personne',HiddenType::class)
    ->add('save', SubmitType::class, array('label' => 'Réserver'));
    }


    public function getBlockPrefix()
    {
      return 'particip';
    }
  }
