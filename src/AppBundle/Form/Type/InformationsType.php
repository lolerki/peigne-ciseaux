<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class InformationsType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('photo', FileType::class, array(
                    'label' => 'Photo',
                    'required' => true,
                ))
                ->add('nom', TextType::class, array(
                    'label' => 'Nom',
                    'required' => true,
                ))
                ->add('prenom', TextType::class, array(
                    'label' => 'Prénom',
                    'required' => true,
                ))
                ->add('daten', DateType::class, array(
                    'label' => 'Date de naissance',
                    'required' => true,
                ))
                ->add('description', TextareaType::class, array(
                    'label' => 'Bio',
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
        return 'informations';
    }

}
