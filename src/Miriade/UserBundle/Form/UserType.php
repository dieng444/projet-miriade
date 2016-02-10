<?php

namespace Miriade\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
        ->add('lastname', 'text', array('label' => 'Nom', 'required' => true))
        ->add('firstname', 'text', array('label' => 'Prénom', 'required' => true))
        ->add('email', 'text', array('label' => 'Email', 'required' => true))
        ->add('enterprise', 'text', array('label' => 'Nom de l\'entreprise', 'required' => false))
        ->add('job', 'text', array('label' => 'Poste occupé', 'required' => false))
        ->add('siret', 'text', array('label' => 'SIRET', 'required' => true))
        ->add('adress', 'text', array('label' => 'Adresse', 'required' => true))
        ->add('zipcode', 'text', array('label' => 'Code postal', 'required' => true))
        ->add('city', 'text', array('label' => 'Ville', 'required' => true))
        ->add('phone', 'text', array('label' => 'Téléphone', 'required' => true))
        ->add('roles', 'choice', array('choices' =>
                array(
                    'ROLE_PARTICIPANT' => "Participant",
                    'ROLE_MANAGER' => "Manager",
                    'ROLE_ADMIN' => "Admin"
                ),
                'required'  => true,
                'multiple' => true
            ));
  }

  public function setDefaultOptions(OptionsResolverInterface $resolver)
  {
    $resolver->setDefaults(array(
      'data_class' => 'Miriade\UserBundle\Entity\User'
    ));
  }

  public function getName()
  {
    return 'miriade_userbundle_user';
  }
}