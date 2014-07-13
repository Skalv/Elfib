<?php

namespace elfib\MouvementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class livraisonMPType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('emplacementArrive', 'entity', array(
                'class'    => 'elfibStockBundle:Emplacements',
                'query_builder' => function(EntityRepository $er) {
                    return $er->createQueryBuilder('emp')
                        ->where('emp.currentOccupancy < 1');
                },
                'property' => 'libelle',
                'multiple' => false,
                'expanded' => false,
            ))
            ->add('matierePremiere', 'entity', array(
                'class'    => 'elfibArticleBundle:MatierePremiere',
                'property' => 'libelle',
                'multiple' => false,
                'expanded' => false,
            ))
            ->add('quantite')
            ->add('expediteur', 'entity', array(
                'class'    => 'elfibCommercialBundle:Fournisseurs',
                'property' => 'nom',
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
            'data_class' => 'elfib\MouvementBundle\Entity\livraisonMP'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'elfib_mouvementbundle_livraisonmp';
    }
}
