<?php

namespace Miriade\EventBundle\Form;

use Doctrine\ORM\EntityRepository;
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
            ->add('title', 'text', array('label' => 'Title', 'required' => true ))
            ->add('description', 'text', array('label' => 'Description','required' => true))
            ->add('startDate', 'datetime', array('label' => 'startDate','required' => true))
            ->add('endDate', 'datetime', array('label' => 'endDate','required' => true))
            ->add('locate', 'text', array('label' => 'Adresse', 'required' => true))
            ->add('image', 'text', array('label' => 'Image', 'required' => false))
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
