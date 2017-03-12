<?php

namespace AppBundle\Form;

use AppBundle\Entity\Trajet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
class TrajetForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('_villedep',TextType::class)
            ->add('_villefin',TextType::class)
            ->add('_heuredep', DateType::class,array(
                    'widget' => 'single_text',

                    // do not render as type="date", to avoid HTML5 date pickers
                    'html5' => false,

                    // add a class that can be selected in JavaScript
                    //'attr' => ['class' => 'js-datepicker'],

            ))
            ->add('_nbplaces',ChoiceType::class, array(
                'choices'  => array(
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                    '6' => 6,
                )))
            ->add('_heure',ChoiceType::class,array(
                'choices' => array(
                    '1' => 1,
                    '2' => 2,
                    '3' => 3,
                    '4' => 4,
                    '5' => 5,
                    '6' => 6,
                    '7' => 7,
                    '8' => 8,
                    '9' => 9,
                    '10' => 1,
                    '11' => 11,
                    '12' => 12,
                    '13' => 13,
                    '14' => 14,
                    '15' => 15,
                    '16' => 16,
                    '17' => 17,
                    '18' => 18,
                    '19' => 19,
                    '20' => 20,
                    '21' => 21,
                    '22' => 22,
                    '23' => 23,
                    '24' => 00,
                    )
                ))
            ->add('_min',ChoiceType::class,array(
                'choices' => array(
                    '0' => 00,
                    '10' => 10,
                    '20' => 20,
                    '30' => 30,
                    '40' => 40,
                    '50' => 50,
                    '0' => 00,
            )))


            ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Trajet::class,
            'validation_groups' => ['Default', 'Trajet']
        ]);
    }

    public function getBlockPrefix()
    {
        return 'app_bundle_trajet_form';
    }
}
