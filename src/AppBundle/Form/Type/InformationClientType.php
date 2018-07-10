<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use AppBundle\Entity\User;

class InformationClientType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
    	$builder

    	->add('lastName', TextType::class, array(
    		'label' => 'Nom *',
    		'required' => true,
    	))
    	->add('firstName', TextType::class, array(
    		'label' => 'Prénom *',
    		'required' => true,
    	))
    	->add('phonenumber', TextType::class, array(
    		'label' => 'Numéro *',
    		'required' => true,
    	))
    	->add('street', TextType::class, array(
    		'label' => 'Rue *',
    		'required' => true,
    	))
    	->add('city', TextType::class, array(
    		'label' => 'Ville *',
    		'required' => true,
    	))
    	->add('zipcode', TextType::class, array(
    		'label' => 'Code postal *',
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

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));
    }


}
