<?php
namespace My\BlogBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name','text')
            ->add('email','email')
            ->add('message','textarea')
            ->add('save','submit');
    }

    public function getName()
    {
        return 'contact';
    }
}