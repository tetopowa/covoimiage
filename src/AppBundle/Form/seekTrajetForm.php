<?php

namespace AppBundle\Form;

use AppBundle\Entity\Trajet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

/**
 *
 */
class seekTrajetForm extends AbstractType
{

  public function buildForm(FormBuilderInterface $builder, array $options){

    $builder
      ->add('villedep',TextType::class)
      ->add('villefin',TextType::class)
      ->add('date', DateType::class,array(
              'widget' => 'single_text',
              'format' => 'dd-MM-yyyy',
              'input' => 'string'
      ))
      ->add('IDvilledep',HiddenType::class)
      ->add('IDvillefin',HiddenType::class)
      // ->add('_date',TextType::class)
      ->getForm();
  }

  public function getBlockPrefix()
  {
      return 'seekTrajet_form';
  }
}
