<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;


class ReferenciaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                'choices' => array(
                    'Article' => 'Article',
                    'Incollection' => 'Incollection',
                    'Proceedings' => 'Proceedings',
                    'Book' => 'Book',
                    'Inproceedings' => 'Inproceedings',
                    'Preprint' => 'Preprint',
                    'Thesis' => 'Thesis',
                ),
                'choices_as_values' => true,
                'placeholder' => ''
            ));

        $builder->get('type')->addEventListener(
            FormEvents::PRE_SUBMIT,
            function (FormEvent $event) {
                $form = $event->getForm()->getParent();
                $tipo = $event->getData();

                if ($tipo === 'Article') {
                    $form->add('title');
                    $form->add('author');
                    $form->add('authors');
                    $form->add('yearpub');
                    $form->add('keywords');
                    $form->add('msc');
                    $form->add('notas');
                    $form->add('mrnumber');
                    $form->add('zmath');
                    $form->add('arxiv');
                    $form->add('file');
                    $form->add('url');
                    $form->add('wos');
                    $form->add('scopus');
                    $form->add('scielo');
                    $form->add('cites');
//                    diferentes en articulo
                    $form->add('journals');
                    $form->add('volume');
                    $form->add('abst');
                    $form->add('pages');
                    $form->add('doi');
                    $form->add('issn');
                    $form->add('e_issn');
                }else if ($tipo === "Incollection"){
                    $form->add('title');
                    $form->add('author');
                    $form->add('authors');
                    $form->add('yearpub');
                    $form->add('keywords');
                    $form->add('msc');
                    $form->add('notas');
                    $form->add('mrnumber');
                    $form->add('zmath');
                    $form->add('arxiv');
                    $form->add('file');
                    $form->add('url');
                    $form->add('wos');
                    $form->add('scopus');
                    $form->add('scielo');
                    $form->add('cites');
                }else if ($tipo === "Proceedings"){
                    $form->add('title');
                    $form->add('author');
                    $form->add('authors');
                    $form->add('yearpub');
                    $form->add('keywords');
                    $form->add('msc');
                    $form->add('notas');
                    $form->add('mrnumber');
                    $form->add('zmath');
                    $form->add('arxiv');
                    $form->add('file');
                    $form->add('url');
                    $form->add('wos');
                    $form->add('scopus');
                    $form->add('scielo');
                    $form->add('cites');
                }else if ($tipo === "Book"){
                    $form->add('title');
                    $form->add('author');
                    $form->add('authors');
                    $form->add('yearpub');
                    $form->add('keywords');
                    $form->add('msc');
                    $form->add('notas');
                    $form->add('mrnumber');
                    $form->add('zmath');
                    $form->add('arxiv');
                    $form->add('file');
                    $form->add('url');
                    $form->add('wos');
                    $form->add('scopus');
                    $form->add('scielo');
                    $form->add('cites');
                }else if ($tipo === "Inproceedings"){
                    $form->add('title');
                    $form->add('author');
                    $form->add('authors');
                    $form->add('yearpub');
                    $form->add('keywords');
                    $form->add('msc');
                    $form->add('notas');
                    $form->add('mrnumber');
                    $form->add('zmath');
                    $form->add('arxiv');
                    $form->add('file');
                    $form->add('url');
                    $form->add('wos');
                    $form->add('scopus');
                    $form->add('scielo');
                    $form->add('cites');
                }else if ($tipo === "Preprint"){
                    $form->add('title');
                    $form->add('author');
                    $form->add('authors');
                    $form->add('yearpub');
                    $form->add('keywords');
                    $form->add('msc');
                    $form->add('notas');
                    $form->add('mrnumber');
                    $form->add('zmath');
                    $form->add('arxiv');
                    $form->add('file');
                    $form->add('url');
                    $form->add('wos');
                    $form->add('scopus');
                    $form->add('scielo');
                    $form->add('cites');
                }else if ($tipo === "Thesis"){
                    $form->add('title');
                    $form->add('author');
                    $form->add('authors');
                    $form->add('yearpub');
                    $form->add('keywords');
                    $form->add('msc');
                    $form->add('notas');
                    $form->add('mrnumber');
                    $form->add('zmath');
                    $form->add('arxiv');
                    $form->add('file');
                    $form->add('url');
                    $form->add('wos');
                    $form->add('scopus');
                    $form->add('scielo');
                    $form->add('cites');
                }
            }
        );
//     ('yearpreprint')('issue')'address')-'publisher')-('placepub')('editor')('thesistype')('advisor')('school')('booktitle')('isbn')('revision')('created')('modified')('reportnumber')('user')

    }

    /**
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
