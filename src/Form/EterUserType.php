<?php

namespace App\Form;

use App\Entity\EterUser;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EterUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id')
            ->add('user_login')
            ->add('user_date')
            ->add('user_mail')
            ->add('user_password')
            ->add('user_address')
            ->add('user_zip')
            ->add('user_city')
            ->add('user_discord')
            ->add('user_sex')
            ->add('statut')
            ->add('user_description')
            ->add('user_update')
            ->add('user_avatar')
            ->add('user_role')
            ->add('label')
            ->add('user_clan')
            ->add('user_game')
            ->add('eterEvents')
            ->add('user_stream')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EterUser::class,
        ]);
    }
}
