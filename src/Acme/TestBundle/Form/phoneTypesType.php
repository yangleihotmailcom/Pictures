<?php

namespace Acme\TestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class phoneTypesType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('typeName')
        ;
    }

    public function getName()
    {
        return 'acme_testbundle_phonetypestype';
    }
}
