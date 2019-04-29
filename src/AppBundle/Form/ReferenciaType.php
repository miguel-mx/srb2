<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReferenciaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('type')->add('authors')->add('title')->add('yearpreprint')->add('yearpub')->add('journal')->add('issue')->add('pages')->add('address')->add('keywords')->add('abst')->add('publisher')->add('placepub')->add('editor')->add('thesistype')->add('advisor')->add('school')->add('booktitle')->add('issn')->add('isbn')->add('notas')->add('revision')->add('file')->add('url')->add('doi')->add('arxiv')->add('zmath')->add('created')->add('modified')->add('volume')->add('reportnumber')->add('msc')->add('mrnumber')->add('user')->add('author');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Referencia'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_referencia';
    }


}
