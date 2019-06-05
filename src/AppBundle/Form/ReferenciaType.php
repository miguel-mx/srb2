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
                    'Material Editorial' => 'material editorial',
                ),
                'choices_as_values' => true
            ));

        $builder->get('type')->addEventListener(
            FormEvents::PRE_SUBMIT,
            function (FormEvent $event) {
                $form = $event->getForm()->getParent();
                $tipo = $event->getData();

                if ($tipo === 'article') {
                    $form
                        ->add('title', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('author')
                        ->add('authors')
                        ->add('yearpub', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('keywords')
                        ->add('msc')
                        ->add('notas', 'Symfony\Component\Form\Extension\Core\Type\TextareaType', array('required' => false,))
                        ->add('mrnumber')
                        ->add('zmath')
                        ->add('arxiv')
                        ->add('url', 'Symfony\Component\Form\Extension\Core\Type\UrlType', array('required' => false))
                        ->add('wos')
                        ->add('scopus')
                        ->add('scielo')
//                    diferentes en articulo
                        ->add('journals', null, ['required' => true])
                        ->add('abst', 'Symfony\Component\Form\Extension\Core\Type\TextareaType', array('required' => false,))
                        ->add('pages')
                        ->add('doi', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('issn')
                        ->add('e_issn');


                } else if ($tipo === "incollection") {
                    $form
                        ->add('title', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('author')
                        ->add('authors')
                        ->add('yearpub', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('keywords')
                        ->add('msc')
                        ->add('notas', 'Symfony\Component\Form\Extension\Core\Type\TextareaType', array('required' => false,))
                        ->add('mrnumber')
                        ->add('zmath')
                        ->add('arxiv')
                        ->add('url', 'Symfony\Component\Form\Extension\Core\Type\UrlType', array('required' => false))
                        ->add('wos')
                        ->add('scopus')
                        ->add('scielo')
//                  diferentes en incollection
                        ->add('booktitle')
                        ->add('publisher')
                        ->add('editor')
                        ->add('address')
                        ->add('abst', 'Symfony\Component\Form\Extension\Core\Type\TextareaType', array('required' => false,))
                        ->add('volume')
                        ->add('pages')
                        ->add('doi', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('isbn')
                        ->add('e_isbn');

                } else if ($tipo === "proceedings") {
                    $form
                        ->add('title', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('author')
                        ->add('authors')
                        ->add('yearpub', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('keywords')
                        ->add('msc')
                        ->add('notas', 'Symfony\Component\Form\Extension\Core\Type\TextareaType', array('required' => false,))
                        ->add('mrnumber')
                        ->add('zmath')
                        ->add('arxiv')
                        ->add('url', 'Symfony\Component\Form\Extension\Core\Type\UrlType', array('required' => false))
                        ->add('wos')
                        ->add('scopus')
                        ->add('scielo')
//                  diferentes en proceedings
                        ->add('publisher')
                        ->add('editor')
                        ->add('journals', null, ['required' => true])
                        ->add('address')
                        ->add('issn')
                        ->add('e_issn')
                        ->add('volume')
                        ->add('pages')
                        ->add('doi', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('isbn')
                        ->add('e_isbn');


                } else if ($tipo === "book") {
                    $form
                        ->add('title', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('author')
                        ->add('authors')
                        ->add('yearpub', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('keywords')
                        ->add('msc')
                        ->add('notas', 'Symfony\Component\Form\Extension\Core\Type\TextareaType', array('required' => false,))
                        ->add('mrnumber')
                        ->add('zmath')
                        ->add('arxiv')
                        ->add('url', 'Symfony\Component\Form\Extension\Core\Type\UrlType', array('required' => false))
                        ->add('wos')
                        ->add('scopus')
                        ->add('scielo')
//                    diferentes en book
                        ->add('publisher', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('editor', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('address')
                        ->add('pages')
                        ->add('doi', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('isbn', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('e_isbn');


                } else if ($tipo === "inproceedings") {
                    $form
                        ->add('title', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('author')
                        ->add('authors')
                        ->add('yearpub', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('keywords')
                        ->add('msc')
                        ->add('notas', 'Symfony\Component\Form\Extension\Core\Type\TextareaType', array('required' => false,))
                        ->add('mrnumber')
                        ->add('zmath')
                        ->add('arxiv')
                        ->add('url', 'Symfony\Component\Form\Extension\Core\Type\UrlType', array('required' => false))
                        ->add('wos')
                        ->add('scopus')
                        ->add('scielo')
//                  diferentes en Inproceedings
                        ->add('booktitle', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('publisher', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('editor', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('address')
                        ->add('abst', 'Symfony\Component\Form\Extension\Core\Type\TextareaType', array(
                            'required' => false,))
                        ->add('volume', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('pages')
                        ->add('journals', null, ['required' => true])
                        ->add('issn')
                        ->add('e_issn')
                        ->add('doi', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('isbn')
                        ->add('e_isbn');
                } else if ($tipo === "preprint") {
                    $form
                        ->add('title', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('author')
                        ->add('authors')
                        ->add('yearpub', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('keywords')
                        ->add('msc')
                        ->add('notas', 'Symfony\Component\Form\Extension\Core\Type\TextareaType', array('required' => false,))
                        ->add('mrnumber')
                        ->add('zmath')
                        ->add('arxiv')
                        ->add('url', 'Symfony\Component\Form\Extension\Core\Type\UrlType', array('required' => false))
                        ->add('wos')
                        ->add('scopus')
                        ->add('scielo')
//                  diferentes en Preprint
                        ->add('abst', 'Symfony\Component\Form\Extension\Core\Type\TextareaType', array('required' => false,))
                        ->add('pages')
                        ->add('reportnumber');


                } else if ($tipo === "thesis") {
                    $form
                        ->add('title', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('author')
                        ->add('authors')
                        ->add('yearpub', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('keywords')
                        ->add('msc')
                        ->add('notas', 'Symfony\Component\Form\Extension\Core\Type\TextareaType', array('required' => false,))
                        ->add('mrnumber')
                        ->add('zmath')
                        ->add('arxiv')
                        ->add('url', 'Symfony\Component\Form\Extension\Core\Type\UrlType', array('required' => false))
                        ->add('wos')
                        ->add('scopus')
                        ->add('scielo')
//                  diferentes en thesis
                        ->add('advisor', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('thesistype', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                            'choices' => array(
                                '' => '',
                                'Licenciatura' => 'licenciatura',
                                'Maestria' => 'maestria',
                                'Doctorado' => 'doctorado'
                            )))
                        ->add('school');


                } else if ($tipo === "material editorial") {
                    $form
                        ->add('title', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('author')
                        ->add('authors')
                        ->add('yearpub', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('keywords')
                        ->add('msc')
                        ->add('notas', 'Symfony\Component\Form\Extension\Core\Type\TextareaType', array('required' => false,))
                        ->add('mrnumber')
                        ->add('zmath')
                        ->add('arxiv')
                        ->add('url', 'Symfony\Component\Form\Extension\Core\Type\UrlType', array('required' => false))
                        ->add('wos')
                        ->add('scopus')
                        ->add('scielo')
//                  diferentes en thesis;
                        ->add('doi', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('volume', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('pages')
                        ->add('journals', null, ['required' => true]);

                }
            }
        );

        $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event) {
            $tipo = $event->getData();
            $form = $event->getForm();
            if ($tipo and $tipo->getType()) {
                if ($tipo->getType() === "article") {
                    $form
                        ->add('title','Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('author')
                        ->add('authors')
                        ->add('yearpub','Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('keywords')
                        ->add('msc')
                        ->add('notas','Symfony\Component\Form\Extension\Core\Type\TextareaType', array('required' => false,))
                        ->add('mrnumber')
                        ->add('zmath')
                        ->add('arxiv')
                        ->add('url','Symfony\Component\Form\Extension\Core\Type\UrlType', array('required' => false))
                        ->add('wos')
                        ->add('scopus')
                        ->add('scielo')
//                    diferentes en articulo
                        ->add('journals',null,['required' => true])
                        ->add('volume')
                        ->add('abst','Symfony\Component\Form\Extension\Core\Type\TextareaType', array('required' => false,))
                        ->add('pages')
                        ->add('doi','Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('issn')
                        ->add('e_issn');


                } else if ($tipo->getType() === "incollection") {
                    $form
                        ->add('title','Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('author')
                        ->add('authors')
                        ->add('yearpub','Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('keywords')
                        ->add('msc')
                        ->add('notas','Symfony\Component\Form\Extension\Core\Type\TextareaType', array('required' => false,))
                        ->add('mrnumber')
                        ->add('zmath')
                        ->add('arxiv')
                        ->add('url','Symfony\Component\Form\Extension\Core\Type\UrlType', array('required' => false))
                        ->add('wos')
                        ->add('scopus')
                        ->add('scielo')
//                  diferentes en incollection
                        ->add('booktitle')
                        ->add('publisher')
                        ->add('editor')
                        ->add('address')
                        ->add('abst','Symfony\Component\Form\Extension\Core\Type\TextareaType', array('required' => false,))
                        ->add('volume')
                        ->add('pages')
                        ->add('doi','Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('isbn')
                        ->add('e_isbn');

                } else if ($tipo->getType() === "proceedings") {
                    $form
                        ->add('title','Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('author')
                        ->add('authors')
                        ->add('yearpub','Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('keywords')
                        ->add('msc')
                        ->add('notas','Symfony\Component\Form\Extension\Core\Type\TextareaType', array('required' => false,))
                        ->add('mrnumber')
                        ->add('zmath')
                        ->add('arxiv')
                        ->add('url','Symfony\Component\Form\Extension\Core\Type\UrlType', array('required' => false))
                        ->add('wos')
                        ->add('scopus')
                        ->add('scielo')
//                  diferentes en proceedings
                        ->add('publisher')
                        ->add('editor')
                        ->add('journals',null,['required' => true])
                        ->add('address')
                        ->add('issn')
                        ->add('e_issn')
                        ->add('volume')
                        ->add('pages')
                        ->add('doi','Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('isbn')
                        ->add('e_isbn');


                } else if ($tipo->getType() === "book") {
                    $form
                        ->add('title','Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('author')
                        ->add('authors')
                        ->add('yearpub','Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('keywords')
                        ->add('msc')
                        ->add('notas','Symfony\Component\Form\Extension\Core\Type\TextareaType', array('required' => false,))
                        ->add('mrnumber')
                        ->add('zmath')
                        ->add('arxiv')
                        ->add('url','Symfony\Component\Form\Extension\Core\Type\UrlType', array('required' => false))
                        ->add('wos')
                        ->add('scopus')
                        ->add('scielo')
//                    diferentes en book
                        ->add('publisher','Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('editor','Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('address')
                        ->add('pages')
                        ->add('doi','Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('isbn','Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('e_isbn');
                } else if ($tipo->getType() === "inproceedings") {
                    $form
                        ->add('title','Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('author')
                        ->add('authors')
                        ->add('yearpub','Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('keywords')
                        ->add('msc')
                        ->add('notas','Symfony\Component\Form\Extension\Core\Type\TextareaType', array('required' => false,))
                        ->add('mrnumber')
                        ->add('zmath')
                        ->add('arxiv')
                        ->add('url','Symfony\Component\Form\Extension\Core\Type\UrlType', array('required' => false))
                        ->add('wos')
                        ->add('scopus')
                        ->add('scielo')
//                  diferentes en Inproceedings
                        ->add('booktitle','Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('publisher','Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('editor','Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('address')
                        ->add('abst','Symfony\Component\Form\Extension\Core\Type\TextareaType', array(
                            'required' => false,))
                        ->add('volume','Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('pages')
                        ->add('journals',null,['required' => true])
                        ->add('issn')
                        ->add('e_issn')
                        ->add('doi','Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('isbn')
                        ->add('e_isbn');

                } else if ($tipo->getType() === "preprint") {
                    $form
                        ->add('title','Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('author')
                        ->add('authors')
                        ->add('yearpub','Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('keywords')
                        ->add('msc')
                        ->add('notas','Symfony\Component\Form\Extension\Core\Type\TextareaType', array('required' => false,))
                        ->add('mrnumber')
                        ->add('zmath')
                        ->add('arxiv')
                        ->add('url','Symfony\Component\Form\Extension\Core\Type\UrlType', array('required' => false))
                        ->add('wos')
                        ->add('scopus')
                        ->add('scielo')
//                  diferentes en Preprint
                        ->add('abst','Symfony\Component\Form\Extension\Core\Type\TextareaType', array('required' => false,))
                        ->add('pages')
                        ->add('reportnumber');

                } else if ($tipo->getType() === "thesis") {
                    $form
                        ->add('title','Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('author')
                        ->add('authors')
                        ->add('yearpub','Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('keywords')
                        ->add('msc')
                        ->add('notas','Symfony\Component\Form\Extension\Core\Type\TextareaType', array('required' => false,))
                        ->add('mrnumber')
                        ->add('zmath')
                        ->add('arxiv')
                        ->add('url','Symfony\Component\Form\Extension\Core\Type\UrlType', array('required' => false))
                        ->add('wos')
                        ->add('scopus')
                        ->add('scielo')
//                  diferentes en thesis
                        ->add('advisor','Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('thesistype', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                            'choices' => array(
                                '' => '',
                                'Licenciatura' => 'licenciatura',
                                'Maestria' => 'maestria',
                                'Doctorado' => 'doctorado'
                            )))
                        ->add('school');
                } else if ($tipo->getType() ===  "material editorial") {
                    $form
                        ->add('title', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('author')
                        ->add('authors')
                        ->add('yearpub', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('keywords')
                        ->add('msc')
                        ->add('notas', 'Symfony\Component\Form\Extension\Core\Type\TextareaType', array('required' => false,))
                        ->add('mrnumber')
                        ->add('zmath')
                        ->add('arxiv')
                        ->add('url', 'Symfony\Component\Form\Extension\Core\Type\UrlType', array('required' => false))
                        ->add('wos')
                        ->add('scopus')
                        ->add('scielo')
//                  diferentes en thesis;
                        ->add('doi', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('volume', 'Symfony\Component\Form\Extension\Core\Type\TextType', array('required' => true,))
                        ->add('pages')
                        ->add('journals', null, ['required' => true]);

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
