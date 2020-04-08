<?php

namespace App\Form;

use App\Entity\EterUser;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user_login')
            ->add('user_mail')
            ->add('user_password', PasswordType::class)
            ->add('confirm_user_password', PasswordType::class)
            ->add('user_address')
            ->add('user_zip')
            ->add('user_city')
            ->add('user_discord')
            ->add('user_sex')
            ->add('user_description')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EterUser::class,
        ]);
    }
}
