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
            ->add('nom')
            ->add('activite')
            ->add('sieRue')
            ->add('sieCP')
            ->add('sieVille')
            ->add('livRue')
            ->add('livCP')
            ->add('livVille')
            ->add('facRue')
            ->add('facCP')
            ->add('facVille')
            ->add('formeJuridique')
            ->add('rcs')
            ->add('siret')
            ->add('stdTel')
            ->add('tel')
            ->add('fax')
            ->add('ca')
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
