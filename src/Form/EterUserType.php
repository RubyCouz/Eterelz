<?php

namespace App\Form;

use App\Entity\EterGame;
use App\Entity\EterUser;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class EterUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /*$choices=[
            'Masculin' => 'Masculin',
            'Féminin' => 'Féminin'
        ];*/

        $builder
            //->add('id')
            ->add('user_login', TextType::class, [
                'required' => false,
                'constraints' => [new Regex(['message' => 'Caractère(s) non autorisé(s)', 'pattern' => '#[0-9a-zA-Zàâäéèêëïîôöùûüç!:_\-.?,/\#]$#'])],
            ])
            //->add('user_date')
            ->add('user_mail', EmailType::class, [
                'required' => false,
                'constraints' => [new Email(['message' => 'Adresse mail non valide !'])],
            ])
            //->add('user_password')
            ->add('user_address', TextType::class, [
                'required' => false,
                'constraints' => [new Regex(['message' => 'Adresse non valide !', 'pattern' => '#[0-9]{1,3}(?:(?:[,. ]){1}[-a-zA-Zàâäéèêëïîôöùûüç]+)*#'])],
            ])
            ->add('user_zip', TextType::class, [
                'required' => false,
                'constraints' => [new Regex(['message' => 'Code postal non valide !', 'pattern' => '#^[0-9]{5}$#'])],
            ])
            ->add('user_city', TextType::class, [
                'required' => false,
                'constraints' => [new Regex(['message' => 'Ville non valide !', 'pattern' => '#^[A-zA-ZéèîïÉÈÎÏ][A-zA-Zéèêàçîï]+([\'\s-][A-zA-ZéèîïÉÈÎÏ][A-zA-Zéèêàçîï])?#'])],
            ])
            ->add('user_discord', TextType::class, [
                'required' => false,
                'constraints' => [new Regex(['message' => 'ID Discord non valide !', 'pattern' => '#^\D+\#\d{4}$#'])],
            ])
            //->add('user_sex', ChoiceType::class, [
            /*Voir pour rendre le choix du sexe facultatif
                'choices' => $choices,
                'expanded' => true,
                'multiple' => false
            ])*/
            //->add('statut')
            ->add('user_description', TextareaType::class, [
                'required' => false,
            ])
            //->add('user_update')
            ->add('user_avatar', FileType::class, [
                //unmapped => fichier non associé à aucune propriété d'entité, validation impossible avec les annotations
                'mapped' => false,
                'required' => false,
                'attr' => ['placeholder' => 'Choisissez un fichier', 'onchange' => 'preview_image(event)'],
                'constraints' => [ new File([
                'maxSize' => '1024k'
                    ])
                ]
            ])
            //->add('user_role')
            //->add('label')
            ->add('user_clan')
            ->add('user_game', EntityType::class, [
                'class' => EterGame::class,
                'choice_label'=>'game_name',
                'expanded' => true,
                'multiple' => true
            ])
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
