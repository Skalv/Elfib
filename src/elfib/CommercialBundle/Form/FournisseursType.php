<?php

namespace elfib\CommercialBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class FournisseursType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code', 'text')
            ->add('adrRue', 'text')
            ->add('adrCP', 'text')
            ->add('adrVille', 'text')
            ->add('nom', 'text')
            ->add('fax', 'text')
            ->add('tel', 'text')
            ->add('email', 'text')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'elfib\CommercialBundle\Entity\Fournisseurs'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'elfib_commercialbundle_fournisseurs';
    }
}
