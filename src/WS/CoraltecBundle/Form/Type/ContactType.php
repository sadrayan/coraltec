<?php
/**
 * Created by PhpStorm.
 * User: sadra
 * Date: 8/2/14
 * Time: 8:23 PM
 */

namespace WS\CoraltecBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Collection;

class ContactType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array(
                'attr' => array(
                    'placeholder' => 'Your full name',
                    'pattern'     => '.{2,}', //minlength
                    'class' => 'form-control'
                )
            ))
            ->add('email', 'email', array(
                'attr' => array(
                    'placeholder' => 'Valid point of contact',
                    'class' => 'form-control'
                )
            ))
            ->add('subject', 'text', array(
                'attr' => array(
                    'placeholder' => 'The subject of your message.',
                    'pattern'     => '.{3,}', //minlength
                    'class' => 'form-control'
                )
            ))
            ->add('company', 'text', array(
                'attr' => array(
                    'placeholder' => 'The subject of your message.',
                    'pattern'     => '.{3,}', //minlength
                    'class' => 'form-control'
                )
            ))
            ->add('message', 'textarea', array(
                'attr' => array(
                    'cols' => 90,
                    'rows' => 10,
                    'placeholder' => 'And your message to me...',
                    'class' => 'form-control'
                )
            ))
            ->add('send', 'submit', array(
                'attr' => array(
                    'cols' => 90,
                    'rows' => 10,
                    'placeholder' => 'And your message to me...',
                    'class' => 'btn btn-primary'
                )
            ))
            ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $collectionConstraint = new Collection(array(
            'name' => array(
                new NotBlank(array('message' => 'Name should not be blank.')),
                new Length(array('min' => 2))
            ),
            'email' => array(
                new NotBlank(array('message' => 'Email should not be blank.')),
                new Email(array('message' => 'Invalid email address.'))
            ),
            'company' => array(
                new NotBlank(array('message' => 'Provide us with you Company please')),
            ),
            'subject' => array(
                new NotBlank(array('message' => 'Subject should not be blank.')),
                new Length(array('min' => 3))
            ),
            'message' => array(
                new NotBlank(array('message' => 'Message should not be blank.')),
                new Length(array('min' => 5))
            )
        ));

        $resolver->setDefaults(array(
            'constraints' => $collectionConstraint
        ));
    }

    public function getName()
    {
        return 'contact';
    }


} 