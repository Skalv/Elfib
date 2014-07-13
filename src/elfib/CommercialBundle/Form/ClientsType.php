<?php

namespace elfib\CommercialBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClientsType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', 'text')
            ->add('activite', 'text')
            ->add('sieRue', 'text')
            ->add('sieCP', 'text')
            ->add('sieVille', 'text')
            ->add('livRue', 'text')
            ->add('livCP', 'text')
            ->add('livVille', 'text')
            ->add('facRue', 'text')
            ->add('facCP', 'text')
            ->add('facVille', 'text')
            ->add('formeJuridique', 'text')
            ->add('rcs', 'text')
            ->add('siret', 'text')
            ->add('stdTel', 'text')
            ->add('tel', 'text')
            ->add('fax', 'text')
            ->add('ca', 'text')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'elfib\CommercialBundle\Entity\Clients'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'elfib_commercialbundle_clients';
    }
}
