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
            ->add('email', 'textarea', array('label' => 'Mail','required' => true))
            ->add('phone', 'datetime', array('label' => 'Téléphone','required' => true))
            ->add('address', 'datetime', array('label' => 'Adresse','required' => true))
            ->add('city', 'datetime', array('label' => 'Ville','required' => true))
            ->add('cp', 'datetime', array('label' => 'Code postale','required' => true))
            ->add('logo', 'file', array('label' => 'Logo','required' => true))
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
