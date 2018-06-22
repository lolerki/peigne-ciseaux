<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AnnonceType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('description', TextareaType::class, array(
                    'label' => 'Bio',
                    'required' => true,
                ))
                ->add('prix', NumberType::class, array(
                    'label' => 'Prix',
                    'required' => true,
                ))
                ->add('option', ChoiceType::class, array(
                    'label' => 'Option',
                    'required' => true,
                ))
                ->add('subEnregistrer', SubmitType::class, array(
                    'label' => 'Enregistrer',
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'annonce';
    }

}
