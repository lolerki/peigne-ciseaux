<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CarteType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('type', ChoiceType::class, array(
                    'choices'  => array(
                        'Homme' => 'homme',
                        'Femme' => 'femme',
                        'Enfant' => 'enfant',
                    ),
                    'label' => 'Catégorie',
                    'required' => true,
                ))
                ->add('titre', TextType::class, array(

                    'label' => 'Nom',
                    'required' => true,
                ))
                ->add('prix', NumberType::class, array(
                    'label' => 'Prix',
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
        return 'carte';
    }

}
