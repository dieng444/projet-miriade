<?php

namespace Miriade\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->remove('username')
        ->add('lastname', 'text', array('label' => 'Nom', 'required' => true))
        ->add('firstname', 'text', array('label' => 'Prénom', 'required' => true))
        ->add('enterprise', 'text', array('label' => 'Nom de l\'entreprise', 'required' => false))
        ->add('job', 'text', array('label' => 'Poste occupé', 'required' => false))
        ->add('siret', 'text', array('label' => 'SIRET', 'required' => true))
        ->add('adress', 'text', array('label' => 'Adresse', 'required' => true))
        ->add('zipcode', 'text', array('label' => 'Code postal', 'required' => true))
        ->add('city', 'text', array('label' => 'Ville', 'required' => true))
        ->add('phone', 'text', array('label' => 'Téléphone', 'required' => true));

    }

    public function getParent()
    {
        return 'fos_user_registration';
    }

    public function getName()
    {
        return 'miriade_user_registration';
    }
}
