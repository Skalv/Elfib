<?php

namespace elfib\ArticleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use elfib\ArticleBundle\Form\ComposantType;

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
            ->add('composants', 'collection', array('type' => new ComposantType(),
                  'allow_add'    => true,
                  'allow_delete' => true))
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
