<?php

namespace elfib\MouvementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class commandePFType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('produitFini', 'entity', array(
                'class'    => 'elfibArticleBundle:ProduitFini',
                'property' => 'libelle',
                'multiple' => false,
                'expanded' => false,
            ))
            ->add('quantite', 'number')
            ->add('dataExecution', 'date')
            ->add('destinataire', 'entity', array(
                'class'    => 'elfibCommercialBundle:Clients',
                'property' => 'nom',
                'multiple' => false,
                'expanded' => false,
            ))
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
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'elfib\MouvementBundle\Entity\commandePF'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'elfib_mouvementbundle_commandepf';
    }
}
