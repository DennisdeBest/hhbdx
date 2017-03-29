<?php

namespace AppBundle\Form;

use AppBundle\Entity\Bar;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Form\TypeBarType;
class BarType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('adresse')
            ->add('photo1')
            ->add('photo2')
            ->add('nom')
            ->add('typeBar', CollectionType::class, array(
                'entry_type' => TypeBarType::class,
            ))
            ->add('boisson')
            ->add('creneauhh')        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Bar::class
        ));
    }
}
