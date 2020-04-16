<?php

namespace App\Controller;


use App\Entity\EterUser;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController {

    /**
     * @Route("/inscription", name="security_registration")
     */
    //Mailerinterface
    public function registration(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder) {
        
        //Définition de la variable en signalant que l'on veut créer un nouvel utilisateur
        $user = new EterUser(); 
        $inProgress = false;

        //Création du formulaire selon la table user
        $form = $this->createForm(RegistrationType::class, $user);

        //Analyse de la requête
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            
            //Téléchargement de l'avatar

            //Récupération du champ User_Avatar de EterUser
            $file = $user->getUserAvatar();

            if ($file != null){
            //Cryptage du nom de fichier téléchargé
            $fileName = md5(uniqid()).'.'.$file->getClientOriginalExtension();

            //Chemin de téléchargement du dossier
            $file->move($this->getParameter('upload_directory'), $fileName);

            //Importation du fichier dans la BDD
            $user->setUserAvatar($fileName);

            //Chemin de téléchargement du dossier
            $file->move($this->getParameter('upload_directory'), $fileName);

            //Importation du fichier dans la BDD
            $user->setUserAvatar($fileName);
            }
            //Encryptage du mot de passe selon la configuration dans security.yaml de config
            //Le premier paramètre détermine la façon de crypter, le second ce qu'il faut crypter
            $hash = $encoder->encodePassword($user, $user->getUserPassword());

            //Validation du remplacement du mot de passe par un encryptage
            $user->setUserPassword($hash);

            //Garde en mémoire les données soumises
            $manager->persist($user);
            
            //Envoi des données à la BDD
            $manager->flush();

            $email = (new Email())
                ->from('hello@example.com')
                ->to('you@example.com')
                //->cc('cc@example.com')
                //->bcc('bcc@example.com')
                //->replyTo('fabien@example.com')
                //->priority(Email::PRIORITY_HIGH)
                ->subject('Time for Symfony Mailer!')
                ->text('Sending emails is fun again!')
                ->html('<p>See Twig integration for better HTML integration!</p>');

        $mailer->send($email);
    
            //return $this->redirectToRoute('/login');
        }
        //Affichage
        return $this->render('security/registration.html.twig', [
            'inProgress' => $inProgress,
            'form' => $form->createView()
        ]);
    }
    
    /**
     * @Route("/login", name="login");
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