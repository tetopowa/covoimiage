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
      ->add('_villedep',TextType::class)
      ->add('_villefin',TextType::class)
      ->add('_date', DateType::class,array(
              'widget' => 'single_text',
              'format' => 'dd-MM-yyyy',
              'input' => 'string'
      ))
      ->add('ID_villedep',HiddenType::class)
      ->add('ID_villefin',HiddenType::class)
      // ->add('_date',TextType::class)
      ->getForm();
  }

  // public function configureOptions(OptionsResolver $resolver)
  // {
  //     $resolver->setDefaults([
  //         'data_class' => Trajet::class,
  //         'validation_groups' => ['Default', 'Trajet']
  //     ]);
  // }

  public function getBlockPrefix()
  {
      return 'seekTrajet_form';
  }
}
