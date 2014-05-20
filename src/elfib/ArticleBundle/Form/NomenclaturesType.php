<?php

namespace elfib\ArticleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NomenclaturesType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle')
            ->add('dateCreation')
            ->add('prix')
            ->add('seuilMini')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'elfib\ArticleBundle\Entity\Nomenclatures'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'elfib_articlebundle_nomenclatures';
    }
}
