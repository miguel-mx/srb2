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
                    'Article' => 'Article',
                    'Incollection' => 'Incollection',
                    'Proceedings' => 'Proceedings',
                    'Book' => 'Book',
                    'Inproceedings' => 'Inproceedings',
                    'Preprint' => 'Preprint',
                    'Thesis' => 'Thesis',
                ),
                'choices_as_values' => true
            ));

        $builder->get('type')->addEventListener(
            FormEvents::PRE_SUBMIT,
            function (FormEvent $event) {
                $form = $event->getForm()->getParent();
                $tipo = $event->getData();

                if ($tipo === 'Article') {
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
                        ->add('cites')
//                    diferentes en articulo
                        ->add('journal')
                        ->add('volume')
                        ->add('abst')
                        ->add('pages')
                        ->add('doi')
                        ->add('issn')
                        ->add('e_issn');
                } else if ($tipo === "Incollection") {
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
                        ->add('cites')
//                  diferentes en incollection
                        ->add('booktitle')
                        ->add('publisher')
                        ->add('editor')
                        ->add('address')
                        ->add('abst')
                        ->add('volume')
                        ->add('pages')
                        ->add('doi');

                } else if ($tipo === "Proceedings") {
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
                        ->add('cites')
//                  diferentes en proceedings
                        ->add('publisher')
                        ->add('editor')
                        ->add('journal')
                        ->add('address')
                        ->add('issn')
                        ->add('volume')
                        ->add('pages')
                        ->add('doi');



                } else if ($tipo === "Book") {
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
                        ->add('cites')
//                    diferentes en book
                        ->add('publisher')
                        ->add('editor')
                        ->add('address')
                        ->add('pages')
                        ->add('doi')
                        ->add('isbn')
                        ->add('e_isbn');


                } else if ($tipo === "Inproceedings") {
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
                        ->add('cites')
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
                } else if ($tipo === "Preprint") {
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
                        ->add('cites')
//                  diferentes en Preprint
                        ->add('abst')
                        ->add('pages')
                        ->add('reportnumber');


                } else if ($tipo === "Thesis") {
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
                        ->add('cites')
//                  diferentes en Preprint
                        ->add('advisor')
                        ->add('thesistype')
                        ->add('school');
                }
            }
        );

//        $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event) {
//            $tipo = $event->getData();
//            $form = $event->getForm();
//            if ($tipo and $tipo->getType()) {
//                // obtenemos el country por medio del objeto state:
//                if ($tipo->getType() === "Article") {
//                    $form->add('title')
//                        ->add('author', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
//                            'expanded' => true,
//                            'multiple' => true
//                        ))
//                        ->add('authors')
//                        ->add('yearpub')
//                        ->add('keywords')
//                        ->add('msc')
//                        ->add('notas')
//                        ->add('mrnumber')
//                        ->add('zmath')
//                        ->add('arxiv')
//                        ->add('file')
//                        ->add('url')
//                        ->add('wos')
//                        ->add('scopus')
//                        ->add('scielo')
//                        ->add('cites')
////                    diferentes en articulo
//                        ->add('journals')
//                        ->add('volume')
//                        ->add('abst')
//                        ->add('pages')
//                        ->add('doi')
//                        ->add('issn')
//                        ->add('e_issn');
//                } else if ($tipo->getType() === "Incollection") {
//                    $form->add('title');
//                    $form->add('author');
//                    $form->add('authors');
//                    $form->add('yearpub');
//                    $form->add('keywords');
//                    $form->add('msc');
//                    $form->add('notas');
//                    $form->add('mrnumber');
//                    $form->add('zmath');
//                    $form->add('arxiv');
//                    $form->add('file');
//                    $form->add('url');
//                    $form->add('wos');
//                    $form->add('scopus');
//                    $form->add('scielo');
//                    $form->add('cites');
//                } else if ($tipo->getType() === "Proceedings") {
//                    $form->add('title');
//                    $form->add('author');
//                    $form->add('authors');
//                    $form->add('yearpub');
//                    $form->add('keywords');
//                    $form->add('msc');
//                    $form->add('notas');
//                    $form->add('mrnumber');
//                    $form->add('zmath');
//                    $form->add('arxiv');
//                    $form->add('file');
//                    $form->add('url');
//                    $form->add('wos');
//                    $form->add('scopus');
//                    $form->add('scielo');
//                    $form->add('cites');
//                } else if ($tipo->getType() === "Book") {
//                    $form->add('title');
//                    $form->add('author');
//                    $form->add('authors');
//                    $form->add('yearpub');
//                    $form->add('keywords');
//                    $form->add('msc');
//                    $form->add('notas');
//                    $form->add('mrnumber');
//                    $form->add('zmath');
//                    $form->add('arxiv');
//                    $form->add('file');
//                    $form->add('url');
//                    $form->add('wos');
//                    $form->add('scopus');
//                    $form->add('scielo');
//                    $form->add('cites');
//                } else if ($tipo->getType() === "Inproceedings") {
//                    $form->add('title');
//                    $form->add('author');
//                    $form->add('authors');
//                    $form->add('yearpub');
//                    $form->add('keywords');
//                    $form->add('msc');
//                    $form->add('notas');
//                    $form->add('mrnumber');
//                    $form->add('zmath');
//                    $form->add('arxiv');
//                    $form->add('file');
//                    $form->add('url');
//                    $form->add('wos');
//                    $form->add('scopus');
//                    $form->add('scielo');
//                    $form->add('cites');
//                } else if ($tipo->getType() === "Preprint") {
//                    $form->add('title');
//                    $form->add('author');
//                    $form->add('authors');
//                    $form->add('yearpub');
//                    $form->add('keywords');
//                    $form->add('msc');
//                    $form->add('notas');
//                    $form->add('mrnumber');
//                    $form->add('zmath');
//                    $form->add('arxiv');
//                    $form->add('file');
//                    $form->add('url');
//                    $form->add('wos');
//                    $form->add('scopus');
//                    $form->add('scielo');
//                    $form->add('cites');
//                } else if ($tipo->getType() === "Thesis") {
//                    $form->add('title');
//                    $form->add('author');
//                    $form->add('authors');
//                    $form->add('yearpub');
//                    $form->add('keywords');
//                    $form->add('msc');
//                    $form->add('notas');
//                    $form->add('mrnumber');
//                    $form->add('zmath');
//                    $form->add('arxiv');
//                    $form->add('file');
//                    $form->add('url');
//                    $form->add('wos');
//                    $form->add('scopus');
//                    $form->add('scielo');
//                    $form->add('cites');
//                }
//            }
//        });
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
