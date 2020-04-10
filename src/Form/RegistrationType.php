<?php

namespace App\Form;

use App\Entity\EterUser;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $choices=[
            'Masculin' => 'M',
            'Féminin' => 'F'
        ];
        $builder
        //----------------------LOGIN----------------------//

            ->add('user_login', TextType::class, [
                'constraints' => [new NotBlank()],
                'attr' => ['placeholder' => 'Saisissez votre login', 'class' => 'uk-input'],
                'label' => 'Login'
            ])

        //----------------------EMAIL----------------------//

            ->add('user_mail', EmailType::class, [
                'constraints' => [new NotBlank(), new Email(['message' => 'Adresse email non valide'])],
                'attr' => ['placeholder' => 'Saisissez votre adresse email', 'class' => 'uk-input'],
                'label' => 'Email'
            ])

        //----------------------MOT DE PASSE---------------//
            ->add('user_password', PasswordType::class, [
                'constraints' => [new NotBlank(), new Regex(['message' => 'Mot de passe non valide', 'pattern' => '#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$#'])],
                'attr' => ['placeholder' => 'Saisissez un mot de passe', 'class' => 'uk-input'],
                'label' => 'Mot de passe'
            ])

        //----------------CONFIRMATION MOT DE PASSE--------//

            ->add('confirm_user_password', PasswordType::class, [
                'constraints' => [new NotBlank()],
                'attr' => ['placeholder' => 'Confirmez le mot de passe', 'class' => 'uk-input'],
                'label' => 'Confirmation du mot de passe'
            ])

        //----------------------ADRESSE--------------------//

            ->add('user_address', TextType::class, [
                'constraints' => [new NotBlank(), new Regex(['message' => 'Adresse non valide', 'pattern' => '#[0-9]{1,3}(?:(?:[,. ]){1}[-a-zA-Zàâäéèêëïîôöùûüç]+)*#'])],
                'attr' => ['placeholder' => 'Saisissez votre adresse', 'class' => 'uk-input'],
                'label' => 'Adresse'
            ])

        //----------------------CODE POSTAL-----------------//

            ->add('user_zip', TextType::class, [
                'constraints' => [new NotBlank(), new Regex(['message' => 'Code postal non valide', 'pattern' => '#^[0-9]{5}$#'])],
                'attr' => ['placeholder' => 'Saisissez votre code postal', 'class' => 'uk-input'],
                'label' => 'Code postal'
            ])

        //----------------------VILLE----------------------//

            ->add('user_city', TextType::class, [
                'constraints' => [new NotBlank(), new Regex(['message' => 'Code postal non valide', 'pattern' => '#^[A-zA-ZéèîïÉÈÎÏ][A-zA-Zéèêàçîï]+([\'\s-][A-zA-ZéèîïÉÈÎÏ][A-zA-Zéèêàçîï])?#'])], 
                'attr' => ['placeholder' => 'Saisissez votre ville', 'class' => 'uk-input'],
                'label' => 'Ville'
            ])

            //----------------------DISCORD----------------//

            ->add('user_discord', TextType::class, [
                'constraints' => [new NotBlank(), new Regex(['message' => 'ID Discord non valide', 'pattern' => '#^\D+\#\d{4}$#'])],
                'attr' => ['placeholder' => 'Saisissez votre id Discord', 'class' => 'uk-input'],
                'label' => 'Id Discord'
            ])

            //----------------------GENRE-------------------//

            ->add('user_sex', ChoiceType::class, [
                'constraints' => [new NotBlank(['message' => 'Veuillez sélectionner un des champs suivants'])],
                'choices' => $choices,
                'expanded' => true,
                'multiple' => false,
                'label' => 'Sexe'
            ])

            //----------------------DESCRIPTION--------------//

            ->add('user_description', TextareaType::class, [
                'attr' => ['placeholder' => 'Saisissez une description', 'class' => 'uk-input'],
                'label' => 'Description'
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EterUser::class,
        ]);
    }
}