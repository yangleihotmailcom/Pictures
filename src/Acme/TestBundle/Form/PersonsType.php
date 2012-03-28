<?php

namespace Acme\TestBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class PersonsType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('lastName')
       //     ->add('phoneType_id')
            ->add('phoneNum')
            ->add('phoneType')
        ;
    }

    public function getName()
    {
        return 'acme_testbundle_personstype';
    }
}
