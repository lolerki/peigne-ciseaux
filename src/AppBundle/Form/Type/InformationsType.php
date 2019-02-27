<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\CallbackTransformer;
use AppBundle\Entity\User;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
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

        ->add('avatar', FileType::class, array(
            'label' => 'Photo',
            'required' => false,
        ))

        ->add('lastName', TextType::class, array(
            'label' => 'Nom *',
            'required' => true,
        ))

        ->add('firstName', TextType::class, array(
            'label' => 'Prénom *',
            'required' => true,
        ))

        ->add('city', TextType::class, array(
            'label' => 'Ville desservie *',
            'required' => true,
        ))

        ->add('birthday', BirthdayType::class, array(
            'label' => 'Date de naissance *',
            'required' => true,
        ))

        ->add('bio', TextareaType::class, array(
            'label' => 'Bio *',
            'required' => true,
        ))

        ->add('subEnregistrer', SubmitType::class, array(
            'label' => 'Enregistrer',
        ));

        $builder->get('avatar')->addModelTransformer(new CallBackTransformer(
        function($avatar) {
            return null;
        },
        function($avatar) {
            return $avatar;
        }
    ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'informations';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));
    }

}
