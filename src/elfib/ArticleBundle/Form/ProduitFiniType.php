<?php

namespace elfib\ArticleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProduitFiniType extends AbstractType
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
            ->add('matierePremieres', 'entity', array(
                'class'    => 'elfibArticleBundle:MatierePremiere',
                'property' => 'libelle',
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
            'data_class' => 'elfib\ArticleBundle\Entity\ProduitFini'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'elfib_articlebundle_produitfini';
    }
}
