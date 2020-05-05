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

class SigninType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
 
        $builder
            //---------------LOGIN---------------//
            ->add('user_login', TextType::class, [
                'constraints' => [new NotBlank(['message' => 'Vous devez remplir ce champ']), new Regex(['message' => 'Caractère(s) non autorisé(s)', 'pattern' => '#[0-9a-zA-Zàâäéèêëïîôöùûüç!:_\-.?,/\#]$#'])],
            ])
            //---------------MAIL---------------//
            ->add('user_mail', EmailType::class, [
                'constraints' => [new NotBlank(['message' => 'Vous devez remplir ce champ']), new Email(['message' => 'Adresse mail non valide !'])],
                ])

            //-------------PASSWORD-------------//
            ->add('user_password', PasswordType::class, [
                'constraints' => [new NotBlank(['message' => 'Vous devez remplir ce champ']), new Regex(['message' => 'Mot de passe non valide !', 'pattern' => '#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$#'])],
                'help' => 'Votre mot de passe doit contenir au moins une majuscule, une minuscule et des caractères spéciaux'
            ])
            //---------CONFIRM PASSWORD---------//
            ->add('confirm_user_password', PasswordType::class, [
                'constraints' => [new NotBlank(['message' => 'Vous devez remplir ce champ'])],
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