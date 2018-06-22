<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RechercheType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('recherche', TextType::class, array(

                    'required' => true,
                ))
                ->add('subRecherche', SubmitType::class, array(
                    'label' => 'Recherche',
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'recherche';
    }

}
