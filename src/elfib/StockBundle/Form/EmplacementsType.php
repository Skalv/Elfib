<?php

namespace elfib\StockBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EmplacementsType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle', 'text')
            ->add('capacite', 'text')
            ->add('magasin', 'entity', array(
                'class'    => 'elfibStockBundle:Magasins',
                'property' => 'libelle',
                'multiple' => false,
                'expanded' => false,
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'elfib\StockBundle\Entity\Emplacements'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'elfib_stockbundle_emplacements';
    }
}
