<?php

namespace elfib\ArticleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ComposantType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('matierePremiere', 'entity', array(
                'class'    => 'elfibArticleBundle:MatierePremiere',
                'property' => 'libelle',
                'multiple' => false,
                'expanded' => false,
            ))
            ->add('quantite')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'elfib\ArticleBundle\Entity\Composant'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'elfib_articlebundle_composant';
    }
}
