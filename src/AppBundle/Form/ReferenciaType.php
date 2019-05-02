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
            ->add('wos')
            ->add('title')
            ->add('type', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                'choices' => array(
                    'Article' => 'Article',
                    'Book' => 'Book',
                ),
                'choices_as_values' => true,
                'placeholder' => ''
            ));

        $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event){
            $tipo = $event->getData();
            $form = $event->getForm();
            if($tipo and $tipo->gettype()){
                // obtenemos el country por medio del objeto state:
                if($tipo->gettype()=== "Article"){
                        $form->add('issn');
                }

            }
        });
    }

//        $formModifier = function (FormInterface $form,  $type = null) {
//
//            if($type == 'Article') {
//
//                $form->add('abstract');
//
//            }
//            elseif ($type == 'Book') {
//                $form->add('title');
//            }
//        };
//
////         $builder->addEventListener(
////            FormEvents::PRE_SET_DATA,
////            function (FormEvent $event) use ($formModifier) {
////                // this would be your entity, i.e. Reference
////                $data = $event->getData();
////
////                $formModifier($event->getForm(), $data->getType());
////            }
////        );
//
//        $builder->get('type')->addEventListener(
//            FormEvents::POST_SUBMIT,
//            function (FormEvent $event) use ($formModifier) {
//                // It's important here to fetch $event->getForm()->getData(), as
//                // $event->getData() will get you the client data (that is, the ID)
//                $type = $event->getForm()->getData();
//
//                // since we've added the listener to the child, we'll have to pass on
//                // the parent to the callback functions!
//                $formModifier($event->getForm()->getParent(), $type);
//            }
//        );
//
//    }

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
