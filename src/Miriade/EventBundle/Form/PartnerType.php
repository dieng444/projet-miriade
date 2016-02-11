<?php

namespace Miriade\EventBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PartnerType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('label' => 'Titre', 'required' => true ))
            ->add('email', 'text', array('label' => 'Mail','required' => true))
            ->add('phone', 'text', array('label' => 'Téléphone','required' => true))
            ->add('address', 'text', array('label' => 'Adresse','required' => true))
            ->add('city', 'text', array('label' => 'Ville','required' => true))
            ->add('cp', 'text', array('label' => 'Code postal','required' => true))
            ->add('logo', 'file', array('label' => 'Logo','required' => false, 'data_class' => null))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Miriade\EventBundle\Entity\Partner'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'event_eventbundle_event';
    }
}
