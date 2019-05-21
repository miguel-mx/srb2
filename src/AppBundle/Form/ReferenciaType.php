<?php

namespace AppBundle\Form;

use Doctrine\ORM\Query\Expr\Select;
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
                    '' => '',
                    'Article' => 'article',
                    'Incollection' => 'incollection',
                    'Proceedings' => 'proceedings',
                    'Book' => 'book',
                    'Inproceedings' => 'inproceedings',
                    'Preprint' => 'preprint',
                    'Thesis' => 'thesis',
                ),
                'choices_as_values' => true
            ));

        $builder->get('type')->addEventListener(
            FormEvents::PRE_SUBMIT,
            function (FormEvent $event) {
                $form = $event->getForm()->getParent();
                $tipo = $event->getData();

                if ($tipo === 'article') {
                    $form->add('title')
                        ->add('author')
                        ->add('authors')
                        ->add('yearpub')
                        ->add('keywords')
                        ->add('msc')
                        ->add('notas')
                        ->add('mrnumber')
                        ->add('zmath')
                        ->add('arxiv')
                        ->add('file')
                        ->add('url')
                        ->add('wos')
                        ->add('scopus')
                        ->add('scielo')
//                    diferentes en articulo
                        ->add('journal')
                        ->add('volume')
                        ->add('abst')
                        ->add('pages')
                        ->add('doi')
                        ->add('issn')
                        ->add('e_issn');
                } else if ($tipo === "incollection") {
                    $form->add('title')
                        ->add('author')
                        ->add('authors')
                        ->add('yearpub')
                        ->add('keywords')
                        ->add('msc')
                        ->add('notas')
                        ->add('mrnumber')
                        ->add('zmath')
                        ->add('arxiv')
                        ->add('file')
                        ->add('url')
                        ->add('wos')
                        ->add('scopus')
                        ->add('scielo')
//                  diferentes en incollection
                        ->add('booktitle')
                        ->add('publisher')
                        ->add('editor')
                        ->add('address')
                        ->add('abst')
                        ->add('volume')
                        ->add('pages')
                        ->add('doi');

                } else if ($tipo === "proceedings") {
                    $form->add('title')
                        ->add('author')
                        ->add('authors')
                        ->add('yearpub')
                        ->add('keywords')
                        ->add('msc')
                        ->add('notas')
                        ->add('mrnumber')
                        ->add('zmath')
                        ->add('arxiv')
                        ->add('file')
                        ->add('url')
                        ->add('wos')
                        ->add('scopus')
                        ->add('scielo')
//                  diferentes en proceedings
                        ->add('publisher')
                        ->add('editor')
                        ->add('journal')
                        ->add('address')
                        ->add('issn')
                        ->add('volume')
                        ->add('pages')
                        ->add('doi');



                } else if ($tipo === "book") {
                    $form->add('title')
                        ->add('author')
                        ->add('authors')
                        ->add('yearpub')
                        ->add('keywords')
                        ->add('msc')
                        ->add('notas')
                        ->add('mrnumber')
                        ->add('zmath')
                        ->add('arxiv')
                        ->add('file')
                        ->add('url')
                        ->add('wos')
                        ->add('scopus')
                        ->add('scielo')
//                    diferentes en book
                        ->add('publisher')
                        ->add('editor')
                        ->add('address')
                        ->add('pages')
                        ->add('doi')
                        ->add('isbn')
                        ->add('e_isbn');


                } else if ($tipo === "inproceedings") {
                    $form->add('title')
                        ->add('author')
                        ->add('authors')
                        ->add('yearpub')
                        ->add('keywords')
                        ->add('msc')
                        ->add('notas')
                        ->add('mrnumber')
                        ->add('zmath')
                        ->add('arxiv')
                        ->add('file')
                        ->add('url')
                        ->add('wos')
                        ->add('scopus')
                        ->add('scielo')
//                  diferentes en Inproceedings
                        ->add('booktitle')
                        ->add('publisher')
                        ->add('editor')
                        ->add('address')
                        ->add('abst')
                        ->add('volume')
                        ->add('pages')
                        ->add('journal')
                        ->add('issn')
                        ->add('doi');
                } else if ($tipo === "preprint") {
                    $form->add('title')
                        ->add('author')
                        ->add('authors')
                        ->add('yearpreprint')
                        ->add('keywords')
                        ->add('msc')
                        ->add('notas')
                        ->add('mrnumber')
                        ->add('zmath')
                        ->add('arxiv')
                        ->add('file')
                        ->add('url')
                        ->add('wos')
                        ->add('scopus')
                        ->add('scielo')
//                  diferentes en Preprint
                        ->add('abst')
                        ->add('pages')
                        ->add('reportnumber');


                } else if ($tipo === "thesis") {
                    $form->add('title')
                        ->add('author')
                        ->add('authors')
                        ->add('yearpub')
                        ->add('keywords')
                        ->add('msc')
                        ->add('notas')
                        ->add('mrnumber')
                        ->add('zmath')
                        ->add('arxiv')
                        ->add('file')
                        ->add('url')
                        ->add('wos')
                        ->add('scopus')
                        ->add('scielo')
//                  diferentes en Preprint
                        ->add('advisor')
                        ->add('thesistype')
                        ->add('school');
                }
            }
        );

        $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event) {
            $tipo = $event->getData();
            $form = $event->getForm();
            if ($tipo and $tipo->getType()) {
                if ($tipo->getType() === "article") {
                    $form->add('title')
                        ->add('author')
                        ->add('authors')
                        ->add('yearpub')
                        ->add('keywords')
                        ->add('msc')
                        ->add('notas')
                        ->add('mrnumber')
                        ->add('zmath')
                        ->add('arxiv')
                        ->add('file')
                        ->add('url')
                        ->add('wos')
                        ->add('scopus')
                        ->add('scielo')
//                    diferentes en articulo
                        ->add('journal')
                        ->add('volume')
                        ->add('abst')
                        ->add('pages')
                        ->add('doi')
                        ->add('issn')
                        ->add('e_issn');
                } else if ($tipo->getType() === "incollection") {
                    $form->add('title')
                        ->add('author')
                        ->add('authors')
                        ->add('yearpub')
                        ->add('keywords')
                        ->add('msc')
                        ->add('notas')
                        ->add('mrnumber')
                        ->add('zmath')
                        ->add('arxiv')
                        ->add('file')
                        ->add('url')
                        ->add('wos')
                        ->add('scopus')
                        ->add('scielo')
//                  diferentes en incollection
                        ->add('booktitle')
                        ->add('publisher')
                        ->add('editor')
                        ->add('address')
                        ->add('abst')
                        ->add('volume')
                        ->add('pages')
                        ->add('doi');

                } else if ($tipo->getType() === "proceedings") {
                    $form->add('title')
                        ->add('author')
                        ->add('authors')
                        ->add('yearpub')
                        ->add('keywords')
                        ->add('msc')
                        ->add('notas')
                        ->add('mrnumber')
                        ->add('zmath')
                        ->add('arxiv')
                        ->add('file')
                        ->add('url')
                        ->add('wos')
                        ->add('scopus')
                        ->add('scielo')
//                  diferentes en proceedings
                        ->add('publisher')
                        ->add('editor')
                        ->add('journal')
                        ->add('address')
                        ->add('issn')
                        ->add('volume')
                        ->add('pages')
                        ->add('doi');

                } else if ($tipo->getType() === "book") {
                    $form->add('title')
                        ->add('author')
                        ->add('authors')
                        ->add('yearpub')
                        ->add('keywords')
                        ->add('msc')
                        ->add('notas')
                        ->add('mrnumber')
                        ->add('zmath')
                        ->add('arxiv')
                        ->add('file')
                        ->add('url')
                        ->add('wos')
                        ->add('scopus')
                        ->add('scielo')
//                    diferentes en book
                        ->add('publisher')
                        ->add('editor')
                        ->add('address')
                        ->add('pages')
                        ->add('doi')
                        ->add('isbn')
                        ->add('e_isbn');

                } else if ($tipo->getType() === "inproceedings") {
                    $form->add('title')
                        ->add('author')
                        ->add('authors')
                        ->add('yearpub')
                        ->add('keywords')
                        ->add('msc')
                        ->add('notas')
                        ->add('mrnumber')
                        ->add('zmath')
                        ->add('arxiv')
                        ->add('file')
                        ->add('url')
                        ->add('wos')
                        ->add('scopus')
                        ->add('scielo')
//                  diferentes en Inproceedings
                        ->add('booktitle')
                        ->add('publisher')
                        ->add('editor')
                        ->add('address')
                        ->add('abst')
                        ->add('volume')
                        ->add('pages')
                        ->add('journal')
                        ->add('issn')
                        ->add('doi');
                } else if ($tipo->getType() === "preprint") {
                    $form->add('title')
                        ->add('author')
                        ->add('authors')
                        ->add('yearpreprint')
                        ->add('keywords')
                        ->add('msc')
                        ->add('notas')
                        ->add('mrnumber')
                        ->add('zmath')
                        ->add('arxiv')
                        ->add('file')
                        ->add('url')
                        ->add('wos')
                        ->add('scopus')
                        ->add('scielo')
//                  diferentes en Preprint
                        ->add('abst')
                        ->add('pages')
                        ->add('reportnumber');
                } else if ($tipo->getType() === "thesis") {
                    $form->add('title')
                        ->add('author')
                        ->add('authors')
                        ->add('yearpub')
                        ->add('keywords')
                        ->add('msc')
                        ->add('notas')
                        ->add('mrnumber')
                        ->add('zmath')
                        ->add('arxiv')
                        ->add('file')
                        ->add('url')
                        ->add('wos')
                        ->add('scopus')
                        ->add('scielo')
//                  diferentes en Preprint
                        ->add('advisor')
                        ->add('thesistype')
                        ->add('school');
                }
            }
        });

        $builder->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event) {
            $event->stopPropagation();
        }, 900); // Always set a higher priority than ValidationListener
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
