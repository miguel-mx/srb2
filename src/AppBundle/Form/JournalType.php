<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JournalType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name',null, [
            'required' => true,

        ])
            ->add('publisher',null, [
                'required' => true,

            ])
            ->add('issn',null, [
                'required' => true,

            ])
            ->add('eissn',null, [
                'required' => true,
                'label' => 'E-issn',

            ])
            ->add('url',null, [
                'required' => true,

            ])
            ->add('pais',null, [
                'required' => true,

            ]);
    }/**
 * {@inheritdoc}
 */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Journal'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_journal';
    }
}
