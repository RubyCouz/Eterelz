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
    public function registration(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder) {
        
        //Définition de la variable en signalant que l'on veut créer un nouvel utilisateur
        $user = new EterUser(); 
        $inProgress = false;

        //Création du formulaire selon la table user
        $form = $this->createForm(RegistrationType::class, $user);

        //Analyse de la requête
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            //Encryptage du mot de passe selon la configuration dans security.yaml de config
            //Le premier paramètre détermine la façon de crypter, le second ce qu'il faut crypter
            $hash = $encoder->encodePassword($user, $user->getUserPassword());

            //Validation du remplacement du mot de passe par un encryptage
            $user->setUserPassword($hash);

            //Garde en mémoire les données soumises
            $manager->persist($user);
            
            //Envoi des données à la BDD
            $manager->flush();

            //return $this->redirectToRoute('/login');
        }

        //Affichage
        return $this->render('security/registration.html.twig', [
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