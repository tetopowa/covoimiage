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

/**
*
*/
class ParticiperForm extends AbstractType
{

  public function buildForm(FormBuilderInterface $builder, array $options){
    $builder
    ->add('ID_trajet',HiddenType::class)
    ->add('ID_personne',HiddenType::class)
    ->add('_nbplaces',ChoiceType::class, array(
        'choices' => array(
          '1'=>1,
          '2'=>2,
          '3'=>3
        )
    ))
    ->getForm();
    }
    public function configureOptions(OptionsResolver $resolver)
    {
      $resolver->setDefaults(array(
        'data_class' => Participer::class,
        'validation_groups' => ['Default', 'Participer']
      ));
    }

    public function getBlockPrefix()
    {
      return 'particip';
    }
  }
