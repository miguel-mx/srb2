<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FiType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('origen', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
            'choices'  => array(
                'MathSciNet' => 'MathSciNet',
                'MR Number' => 'MR Number',
                'zbMATH' => 'zbMATH',
                'arXiv' => 'arXiv',
                'Web of Science' => 'Web of Science',
                'Scopus' => 'Scopus',
                'SciELO' => 'SciELO',
                ),
                'label' => 'Origin',
                'required' => true,
                )
        )

            ->add('year', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                    'choices'  => array(
                        '2019' => '2019',
                        '2018' => '2018',
                        '2017' => '2017',
                        '2016' => '2016',
                        '2015' => '2015',
                        '2014' => '2014',
                        '2013' => '2013',
                        '2012' => '2012',
                        '2011' => '2011',
                        '2010' => '2010',
                        '2009' => '2009',
                        '2008' => '2008',
                        '2007' => '2007',
                        '2006' => '2006',
                        '2005' => '2005',
                        '2004' => '2004',
                        '2003' => '2003',
                        '2002' => '2002',
                        '2001' => '2001',
                        '2000' => '2000',
                        '1999' => '1999',
                        '1998' => '1998',
                        '1997' => '1997',
                        '1996' => '1996',
                        '1995' => '1995',
                        '1994' => '1994',
                        '1993' => '1993',
                        '1992' => '1992',
                        '1991' => '1991',
                        '1990' => '1990',
                        '1989' => '1989',
                        '1988' => '1988',
                        '1987' => '1987',
                        '1986' => '1986',
                        '1985' => '1985',
                        '1984' => '1984',
                        '1983' => '1983',
                        '1982' => '1982',
                        '1981' => '1981',
                        '1980' => '1980',
                        '1979' => '1979',
                        '1978' => '1978',
                        '1977' => '1977',
                        '1976' => '1976',
                        '1975' => '1975',
                        '1974' => '1974',
                        '1973' => '1973',
                        '1972' => '1972',
                        '1971' => '1971',
                        '1970' => '1970',
                        '1969' => '1969',
                        '1968' => '1968',
                        '1967' => '1967',
                        '1966' => '1966',
                        '1965' => '1965',
                        '1964' => '1964',
                        '1963' => '1963',
                        '1962' => '1962',
                        '1961' => '1961',
                        '1960' => '1960',

                    ),
                    'label' => 'Origin',
                    'required' => true,
                )
            )
            ->add('fi',null, [
                'required' => true,

            ])
            ->add('cuartil',null, [

            ]);

    }/**
 * {@inheritdoc}
 */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Fi'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_fi';
    }


}
