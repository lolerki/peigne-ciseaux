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
                        'class' => 'form-control input-inline datepicker',
                        'data-provide' => 'datepicker',
                        'data-date-format' => 'dd-mm-yyyy'
                    ],
                    'required' => true,
                ))
                ->add('heure', TimeType::class, array(
                    'label' => 'heure',
                    'widget' => 'choice',
                    'required' => true,
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
