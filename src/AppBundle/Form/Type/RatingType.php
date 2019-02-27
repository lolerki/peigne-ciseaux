<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RatingType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('note', ChoiceType::class, array(
                    'choices'  => array(
                        '1/5' => '1',
                        '2/5' => '2',
                        '3/5' => '3',
                        '4/5' => '4',
                        '5/5' => '5'
                    ),
                    'label' => 'Note :',
                    'required' => true,
                ))
                ->add('commentaire', TextareaType::class, array(
                    'label' => 'Commentaire',
                    'required' => false,
                ))
                ->add('subEnregistrer', SubmitType::class, array(
                    'label' => 'Enregistrer',
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'carte';
    }

}
