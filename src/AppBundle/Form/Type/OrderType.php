<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class OrderType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
        ->add('date', DateType::class, array(
            'widget' => 'single_text',
            'label' => 'date',
            'attr' => [
                'min' => date('Y-m-d',strtotime( "+1 day" )),
                'data-date-format' => 'dd-mm-yyyy',
            ],
            'required' => true,
        ))
        ->add('heure', TimeType::class, array(
            'label' => 'heure',
            'widget' => 'choice',
            'required' => true,
            'placeholder' => array(
                'hour' => '07', 'minute' => '00', 'second' => '00',
            ),
            'hours' => array(
                8,9,10,11,12,13,14,15,16,17,18,19,20,21
            ),
            'minutes' => array(
                10,20,30,40,50
            )
        ))
        ->add('idcard', HiddenType::class)
        ->add('subEnregistrer', SubmitType::class, array(
            'label' => 'Valider ma commande',
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'annonce';
    }

}
