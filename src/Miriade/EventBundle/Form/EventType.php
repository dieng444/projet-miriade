<?php

namespace Miriade\EventBundle\Form;

use Doctrine\ORM\EntityRepository;
use Miriade\EventBundle\Entity\Partner;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EventType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text', array('label' => 'Titre', 'required' => true ))
            ->add('description', 'textarea', array('label' => 'Description','required' => true))
            ->add('startDate', 'text', array('label' => 'Date de début','required' => true))
            ->add('endDate', 'text', array('label' => 'Date de fin','required' => true))
            ->add('adress', 'text', array('label' => 'Adresse', 'required' => true))
            ->add('city', 'text', array('label' => 'Ville', 'required' => true))
            ->add('cp', 'text', array('label' => 'Code postale', 'required' => true))
            ->add('image', 'file', array('label' => 'Image', 'required' => false))
            ->add('nbTable', 'text', array('label' => 'Nombre de table', 'required' => false))
            ->add('rdv', 'text', array('label' => 'Durée des rdvs', 'required' => false))
            /*->add('partner', 'collection', array(
                'type' => new PartnerType(),
                'allow_add' => true,
                'allow_delete' => true,
                'prototype'=>true,
                'by_reference' => false,
            ))*/
            /*->add('session', 'collection', array(
                'type' => new SessionType(),
                'allow_add' => true,
                'allow_delete' => true
            ))*/
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Miriade\EventBundle\Entity\Event'
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
