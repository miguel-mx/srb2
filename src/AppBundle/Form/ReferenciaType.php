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
        $builder->add('authores')->add('title')->add('type')->add('yearpreprint')->add('yearpub')->add('publication')->add('journal')->add('issue')->add('pages')->add('corporateauthor')->add('address')->add('keywords')->add('abst')->add('publisher')->add('placepub')->add('editor')->add('issn')->add('isbn')->add('medium')->add('notas')->add('revision')->add('file')->add('url')->add('doi')->add('arxiv')->add('mathscinet')->add('zmath')->add('inspires')->add('created')->add('modified')->add('volume')->add('reportnumber')->add('msc')->add('mrnumber')->add('booktitle')->add('school')->add('advisor')->add('thesistype')->add('user')->add('author');
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
