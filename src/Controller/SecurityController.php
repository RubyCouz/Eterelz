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
        
        $user = new EterUser(); //Définition de la variable en signalant que l'on veut créer un nouvel utilisateur
        $inProgress = true;
        $form = $this->createForm(RegistrationType::class, $user);//Création du formulaire selon la table user

        $form->handleRequest($request);//Analyse de la requête

        if($form->isSubmitted() && $form->isValid()) {

            //Encryptage du mot de passe selon la configuration dans security.yaml de config
            $hash = $encoder->encodePassword($user, $user->getUserPassword());//Le premier paramètre détermine la façon de crypter, le second ce qu'il faut crypter

            $user->setUserPassword($hash);//Validation du remplacement du mot de passe par un encryptage

            $manager->persist($user);//Garde en mémoire les données soumises
            $manager->flush();//Envoi des données à la BDD

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