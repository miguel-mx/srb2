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
                'label' => 'ISSN',

            ])
            ->add('eissn',null, [
                'label' => 'E-ISSN',
                'required' => false,

            ])
            ->add('url',null, [
                'required' => true,

            ])
            ->add('pais', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                'choices'  => array(
                    'Afghanistan' => 'Afghanistan',
                    'Albania' => 'Albania',
                    'Algeria' => 'Algeria',
                    'Andorra' => 'Andorra',
                    'Angola' => 'Angola',
                    'Anguilla' => 'Anguilla',
                    'Antigua & Barbuda' => 'Antigua & Barbuda',
                    'Argentina' => 'Argentina',
                    'Armenia' => 'Armenia',
                    'Australia' => 'Australia',
                    'Austria' => 'Austria',
                    'Azerbaijan' => 'Azerbaijan',
                    'Bahamas' => 'Bahamas',
                    'Bahrain' => 'Bahrain',
                    'Bangladesh' => 'Bangladesh',
                    'Barbados' => 'Barbados',
                    'Belarus' => 'Belarus',
                    'Belgium' => 'Belgium',
                    'Belize' => 'Belize',
                    'Benin' => 'Benin',
                    'Bermuda' => 'Bermuda',
                    'Bhutan' => 'Bhutan',
                    'Bolivia' => 'Bolivia',
                    'Bosnia & Herzegovina' => 'Bosnia & Herzegovina',
                    'Botswana' => 'Botswana',
                    'Brazil' => 'Brazil',
                    'Brunei Darussalam' => 'Brunei Darussalam',
                    'Bulgaria' => 'Bulgaria',
                    'Burkina Faso' => 'Burkina Faso',
                    'Burundi' => 'Burundi',
                    'Cambodia' => 'Cambodia',
                    'Cameroon' => 'Cameroon',
                    'Canada' => 'Canada',
                    'Cape Verde' => 'Cape Verde',
                    'Cayman Islands' => 'Cayman Islands',
                    'Central African Republic' => 'Central African Republic',
                    'Chad' => 'Chad',
                    'Chile' => 'Chile',
                    'China' => 'China',
                    'China - Hong Kong / Macau' => 'China - Hong Kong / Macau',
                    'Colombia' => 'Colombia',
                    'Comoros' => 'Comoros',
                    'Congo' => 'Congo',
                    'Congo, Democratic Republic of (DRC)' => 'Congo, Democratic Republic of (DRC)',
                    'Costa Rica' => 'Costa Rica',
                    'Croatia' => 'Croatia',
                    'Cuba' => 'Cuba',
                    'Cyprus' => 'Cyprus',
                    'Czech Republic' => 'Czech Republic',
                    'Denmark' => 'Denmark',
                    'Djibouti' => 'Djibouti',
                    'Dominica' => 'Dominica',
                    'Dominican Republic' => 'Dominican Republic',
                    'Ecuador' => 'Ecuador',
                    'Egypt' => 'Egypt',
                    'El Salvador' => 'El Salvador',
                    'Equatorial Guinea' => 'Equatorial Guinea',
                    'Eritrea' => 'Eritrea',
                    'Estonia' => 'Estonia',
                    'Ethiopia' => 'Ethiopia',
                    'Fiji' => 'Fiji',
                    'Finland' => 'Finland',
                    'France' => 'France',
                    'French Guiana' => 'French Guiana',
                    'Gabon' => 'Gabon',
                    'Gambia' => 'Gambia',
                    'Georgia' => 'Georgia',
                    'Germany' => 'Germany',
                    'Ghana' => 'Ghana',
                    'Great Britain' => 'Great Britain',
                    'Greece' => 'Greece',
                    'Grenada' => 'Grenada',
                    'Guadeloupe' => 'Guadeloupe',
                    'Guatemala' => 'Guatemala',
                    'Guinea' => 'Guinea',
                    'Guinea-Bissau' => 'Guinea-Bissau',
                    'Guyana' => 'Guyana',
                    'Haiti' => 'Haiti',
                    'Honduras' => 'Honduras',
                    'Hungary' => 'Hungary',
                    'Iceland' => 'Iceland',
                    'India' => 'India',
                    'Indonesia' => 'Indonesia',
                    'Iran' => 'Iran',
                    'Iraq' => 'Iraq',
                    'Israel and the Occupied Territories' => 'Israel and the Occupied Territories',
                    'Italy' => 'Italy',
                    'Ivory Coast (Cote d Ivoire)' => 'Ivory Coast (Cote d Ivoire)',
                    'Jamaica' => 'Jamaica',
                    'Japan' => 'Japan',
                    'Jordan' => 'Jordan',
                    'Kazakhstan' => 'Kazakhstan',
                    'Kenya' => 'Kenya',
                    'Korea, Democratic Republic of (North Korea)' => 'Korea, Democratic Republic of (North Korea)',
                    'Korea, Republic of (South Korea)' => 'Korea, Republic of (South Korea)',
                    'Kosovo' => 'Kosovo',
                    'Kuwait' => 'Kuwait',
                    'Kyrgyz Republic (Kyrgyzstan)' => 'Kyrgyz Republic (Kyrgyzstan)',
                    'Laos' => 'Laos',
                    'Latvia' => 'Latvia',
                    'Lebanon' => 'Lebanon',
                    'Lesotho' => 'Lesotho',
                    'Liberia' => 'Liberia',
                    'Libya' => 'Libya',
                    'Liechtenstein' => 'Liechtenstein',
                    'Lithuania' => 'Lithuania',
                    'Luxembourg' => 'Luxembourg',
                    'Madagascar' => 'Madagascar',
                    'Malawi' => 'Malawi',
                    'Malaysia' => 'Malaysia',
                    'Maldives' => 'Maldives',
                    'Mali' => 'Mali',
                    'Malta' => 'Malta',
                    'Martinique' => 'Martinique',
                    'Mauritania' => 'Mauritania',
                    'Mauritius' => 'Mauritius',
                    'Mayotte' => 'Mayotte',
                    'Mexico' => 'Mexico',
                    'Moldova, Republic of' => 'Moldova, Republic of',
                    'Monaco' => 'Monaco',
                    'Mongolia' => 'Mongolia',
                    'Montenegro' => 'Montenegro',
                    'Montserrat' => 'Montserrat',
                    'Morocco' => 'Morocco',
                    'Mozambique' => 'Mozambique',
                    'Myanmar/Burma' => 'Myanmar/Burma',
                    'Namibia' => 'Namibia',
                    'Nepal' => 'Nepal',
                    'New Zealand' => 'New Zealand',
                    'Nicaragua' => 'Nicaragua',
                    'Niger' => 'Niger',
                    'Nigeria' => 'Nigeria',
                    'North Macedonia, Republic of' => 'North Macedonia, Republic of',
                    'Norway' => 'Norway',
                    'Oman' => 'Oman',
                    'Pacific Islands' => 'Pacific Islands',
                    'Pakistan' => 'Pakistan',
                    'Panama' => 'Panama',
                    'Papua New Guinea' => 'Papua New Guinea',
                    'Paraguay' => 'Paraguay',
                    'Peru' => 'Peru',
                    'Philippines' => 'Philippines',
                    'Poland' => 'Poland',
                    'Portugal' => 'Portugal',
                    'Puerto Rico' => 'Puerto Rico',
                    'Qatar' => 'Qatar',
                    'Reunion' => 'Reunion',
                    'Romania' => 'Romania',
                    'Russian Federation' => 'Russian Federation',
                    'Rwanda' => 'Rwanda',
                    'Saint Kitts and Nevis' => 'Saint Kitts and Nevis',
                    'Saint Lucia' => 'Saint Lucia',
                    'Saint Vincent and the Grenadines' => 'Saint Vincent and the Grenadines',
                    'Samoa' => 'Samoa',
                    'Sao Tome and Principe' => 'Sao Tome and Principe',
                    'Saudi Arabia' => 'Saudi Arabia',
                    'Senegal' => 'Senegal',
                    'Serbia' => 'Serbia',
                    'Seychelles' => 'Seychelles',
                    'Sierra Leone' => 'Sierra Leone',
                    'Singapore' => 'Singapore',
                    'Slovak Republic (Slovakia)' => 'Slovak Republic (Slovakia)',
                    'Slovenia' => 'Slovenia',
                    'Solomon Islands' => 'Solomon Islands',
                    'Somalia' => 'Somalia',
                    'South Africa' => 'South Africa',
                    'South Sudan' => 'South Sudan',
                    'Spain' => 'Spain',
                    'Sri Lanka' => 'Sri Lanka',
                    'Sudan' => 'Sudan',
                    'Suriname' => 'Suriname',
                    'Swaziland' => 'Swaziland',
                    'Sweden' => 'Sweden',
                    'Switzerland' => 'Switzerland',
                    'Syria' => 'Syria',
                    'Tajikistan' => 'Tajikistan',
                    'Tanzania' => 'Tanzania',
                    'Thailand' => 'Thailand',
                    'Netherlands' => 'Netherlands',
                    'Timor Leste' => 'Timor Leste',
                    'Togo' => 'Togo',
                    'Trinidad & Tobago' => 'Trinidad & Tobago',
                    'Tunisia' => 'Tunisia',
                    'Turkey' => 'Turkey',
                    'Turkmenistan' => 'Turkmenistan',
                    'Turks & Caicos Islands' => 'Turks & Caicos Islands',
                    'Uganda' => 'Uganda',
                    'Ukraine' => 'Ukraine',
                    'United Arab Emirates' => 'United Arab Emirates',
                    'United States of America (USA)' => 'United States of America (USA)',
                    'Uruguay' => 'Uruguay',
                    'Uzbekistan' => 'Uzbekistan',
                    'Venezuela' => 'Venezuela',
                    'Vietnam' => 'Vietnam',
                    'Virgin Islands (UK)' => 'Virgin Islands (UK)',
                    'Virgin Islands (US)' => 'Virgin Islands (US)',
                    'Yemen' => 'Yemen',
                    'Zambia' => 'Zambia',
                    'Zimbabwe' => 'Zimbabwe',

                ),
                    'label' => 'Country'
                )
            );
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
