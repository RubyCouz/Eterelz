<?php

namespace App\Form;

use App\Entity\EterUser;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //---------------POUR POUVOIR SELECTIONNER LE SEXE---------------
        $choices=[
            'Masculin' => 'M',
            'Féminin' => 'F'
        ];

        $builder
        //---------------AVATAR---------------//
        //Demander si le nom d'avatar doit être unique
        //Demander quels types de fichiers sont autorisés
        //Demander la taille maximum de fichier autorisés
            ->add('user_avatar', FileType::class, [
                'attr' => ['placeholder' => 'Choisissez un avatar', 'onchange' => 'preview_image(event)'],
                'constraints' => [ new File([
                    'maxSize' => '1024k'
                ])
            ]                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
        ])

        //---------------------------------------------------LOGIN----------------------------------------------------------------//

            ->add('user_login', TextType::class, [
                'constraints' => [new NotBlank(['message' => 'Vous devez remplir ce champ']), new Regex(['message' => 'Caractère(s) non autorisé(s)', 'pattern' => '#[0-9a-zA-Zàâäéèêëïîôöùûüç!:_\-.?,/\#]$#'])],
                'attr' => ['placeholder' => 'Saisissez votre login']
            ])
        //---------------MAIL---------------//
            ->add('user_mail', EmailType::class, [
                'constraints' => [new NotBlank(['message' => 'Vous devez remplir ce champ']), new Email(['message' => 'Adresse mail non valide !'])],
                'attr' => ['placeholder' => 'Saisissez votre adresse mail']
            ])
        //-------------PASSWORD-------------//
        //Rechercher barre de force pour le mot de passe
        //Exclure l'acceptation des caractères < et >
            ->add('user_password', PasswordType::class, [
                'constraints' => [new NotBlank(['message' => 'Vous devez remplir ce champ']), new Regex(['message' => 'Mot de passe non valide !', 'pattern' => '#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$#'])],
                'attr' => ['placeholder' => 'Saisissez un mot de passe', 'id' => 'password'],
                'help' => 'Votre mot de passe doit contenir au moins une majuscule, une minuscule et des caractères spéciaux'
            ])
        //---------CONFIRM PASSWORD---------//
            ->add('confirm_user_password', PasswordType::class, [
                'constraints' => [new NotBlank(['message' => 'Vous devez remplir ce champ'])],
                'attr' => ['placeholder' => 'Confirmez le mot de passe']
            ])
        //-------------ADRESSE-------------//
            ->add('user_address', TextType::class, [
                'constraints' => [new Regex(['message' => 'Adresse non valide !', 'pattern' => '#[0-9]{1,3}(?:(?:[,. ]){1}[-a-zA-Zàâäéèêëïîôöùûüç]+)*#'])],
                'attr' => ['placeholder' => 'Saisissez votre adresse']
            ])
        //-----------CODE POSTAL-----------//
            ->add('user_zip', TextType::class, [
                'constraints' => [new Regex(['message' => 'Code postal non valide !', 'pattern' => '#^[0-9]{5}$#'])],
                'attr' => ['placeholder' => 'Saisissez votre code postal']
            ])
        //--------------VILLE-------------//
            ->add('user_city', TextType::class, [
                'constraints' => [new Regex(['message' => 'Ville non valide !', 'pattern' => '#^[A-zA-ZéèîïÉÈÎÏ][A-zA-Zéèêàçîï]+([\'\s-][A-zA-ZéèîïÉÈÎÏ][A-zA-Zéèêàçîï])?#'])],
                'attr' => ['placeholder' => 'Saisissez votre ville']
            ])
        //------------DISCORD------------//
            ->add('user_discord', TextType::class, [
                'constraints' => [new NotBlank(['message' => 'Vous devez remplir ce champ']), new Regex(['message' => 'ID Discord non valide !', 'pattern' => '#^\D+\#\d{4}$#'])],
                'attr' => ['placeholder' => 'Saisissez votre ID Discord']
            ])
        //-------------SEXE-------------//
            ->add('user_sex', ChoiceType::class, [
                'choices' => $choices,
                'expanded' => true,
                'multiple' => false
            ])
        //---------DESCRIPTION---------//
            ->add('user_description', TextareaType::class, [
                'attr' => ['placeholder' => 'Saisissez une description']
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