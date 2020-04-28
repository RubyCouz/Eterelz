<?php

namespace App\Controller;


use App\Entity\EterUser;
use App\Form\RegistrationType;
use App\Form\SigninType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
//use Symfony\Component\Mailer\MailerInterface;
//use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController {

    /**
     * @Route("/inscription", name="security_registration")
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @param UserPasswordEncoderInterface $encoder
     * @return Response
     */
    public function registration(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder/*, MailerInterface $mailer*/) {
        
        // Définition de la variable en signalant que l'on veut créer un nouvel utilisateur
        $user = new EterUser(); 

        $inProgress = false;

        // Création du formulaire selon la table user
        $form = $this->createForm(SigninType::class, $user);

        // Analyse de la requête
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            //Téléchargement de la photo de profil
            //Récupération du champ User_Avatar de EterUser
            $file = $user->getUserAvatar();
            //Cryptage du nom du fichier téléchargé

            if($file != null){
            
            $fileName = uniqid().'.'.$file->getClientOriginalExtension();
            //Récupération des informations de téléchargement et récupération du chemin du dossier où sera importé le fichier
            $file->move($this->getParameter('upload_directory'), $fileName);
            //Importation du fichier dans la BDD
            $user->setUserAvatar($fileName);
            
            }
            //Encryptage du mot de passe selon la configuration dans security.yaml de config
            //Le premier paramètre détermine la façon de crypter, le second ce qu'il faut crypter
            $hash = $encoder->encodePassword($user, $user->getUserPassword());

            // Validation du remplacement du mot de passe par un encryptage
            $user->setUserPassword($hash);
            $statut = 1;
            $user->setStatut($statut);
            // Garde en mémoire les données soumises
            $manager->persist($user);
            //dd($user);
            // Envoi des données à la BDD
            $manager->flush();

            // return $this->redirectToRoute('login');

            // Envoi mail

            // $mail = $user->getUserMail();

            // $email = (new Email())
                // ->from('contact@eterelz.org')
                // ->to($mail)
                // ->cc('cc@example.com')
                // ->bcc('bcc@example.com')
                // ->replyTo('fabien@example.com')
                // ->priority(Email::PRIORITY_HIGH)
                // ->subject('Confirmation d\'inscription')
                // ->text('Welcome')
                // ->html('<p>See Twig integration for better HTML integration!</p>');

            // $mailer->send($email);

            return $this->redirectToRoute('home');

            return $this->redirectToRoute('home');
        }

        // Affichage
        return $this->render('security/loginModal.html.twig', [
            'inProgress' => $inProgress,
            'form' => $form->createView()
        ]);

        }
    
    /**
     * @Route("/login", name="login")
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    public function login(AuthenticationUtils $authenticationUtils) {
        $error =$authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        $inProgress = false;
        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
            'inProgress' => $inProgress
        ]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout() {

    }
}