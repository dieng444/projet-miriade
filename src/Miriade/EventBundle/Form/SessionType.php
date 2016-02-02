<?php

namespace Miriade\EventBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SessionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('label' => 'Titre', 'required' => true ))
            ->add('horaireDebut', 'text', array('label' => 'Horaire de début','required' => true))
            ->add('horaireFin', 'text', array('label' => 'Horaire de fin','required' => true))
            ->add('description', 'textarea', array('label' => 'Description','required' => true))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Miriade\EventBundle\Entity\Session'
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
