<?php

namespace elfib\ArticleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MatierePremiereType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle')
            ->add('prix')
            ->add('seuilMini')
            ->add('fournisseurs', 'entity', array(
                'class'    => 'elfibCommercialBundle:Fournisseurs',
                'property' => 'nom',
                'multiple' => true,
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
            'data_class' => 'elfib\ArticleBundle\Entity\MatierePremiere'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'elfib_articlebundle_matierepremiere';
    }
}
