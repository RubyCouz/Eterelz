<?php

namespace App\Controller;

use App\Entity\EterUser;
use App\Form\RegistrationType;
use App\Form\ResetPassType;
use App\Form\SigninType;
use App\Repository\EterUserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
//use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Csrf\TokenGenerator\TokenGeneratorInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController {

    /**
     * @Route("/inscription", name="security_registration")
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @param EterUserRepository $entityRepo
     * @param UserPasswordEncoderInterface $encoder
     * @param MailerInterface $mailer
     * @return Response
     * @throws TransportExceptionInterface
     */
    public function registration(Request $request, EntityManagerInterface $manager, EterUserRepository $entityRepo, UserPasswordEncoderInterface $encoder, MailerInterface $mailer)
    {

        // Définition de la variable en signalant que l'on veut créer une nouvelle entité
        $user = new EterUser();
        $inProgress = false;
        // Création du formulaire selon la table user
        $form = $this->createForm(SigninType::class, $user);
        // Analyse de la requête
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

                // Encryptage du mot de passe selon la configuration dans security.yaml de config
                // Le premier paramètre détermine la façon de crypter, le second ce qu'il faut crypter
                $hash = $encoder->encodePassword($user, $user->getUserPassword());

                // Validation du remplacement du mot de passe par un encryptage
                $user->setUserPassword($hash);

                //On génère le token d'activation
                $user->setActivationToken(uniqid());

                $statut = 1;
                $user->setStatut($statut);
                $user->setUserRole('Utilisateur');

                // Garde en mémoire les données soumises
                $manager->persist($user);

                // Envoi des données à la BDD
                $manager->flush();

                // Envoi mail
                $mail = $user->getUserMail();

                $email = (new TemplatedEmail())
                    ->from('contact@eterelz.org')
                    ->to($mail)
                    // ->cc('cc@example.com')
                    // ->bcc('bcc@example.com')
                    // ->replyTo('fabien@example.com')
                    // ->priority(Email::PRIORITY_HIGH)
                    ->subject('Confirmation d\'inscription')
                    //->text('Welcome')
                    //->html('<p>Votre inscription a bien été prise en compte !</p>')
                    ->htmlTemplate('emails/signup.html.twig')
                    ->context([
                        'expiration_date' => new \DateTime('+3 minutes'),
                        'username' => $user->getUserLogin(),
                        'date' => new \DateTime('now'),
                        'token' => $user->getActivationToken()
                    ]);

                $mailer->send($email);
                return $this->redirectToRoute('home');
        }
            // Affichage
            return $this->render('security/loginModal.html.twig', [
                'inProgress' => $inProgress,
                'form' => $form->createView()
            ]);
        }

    /**
     * @Route("/activation/{token}", name="activation")
     * @param $token
     * @param EterUserRepository $entityRepo
     * @param EntityManagerInterface $manager
     * @return RedirectResponse
     */
    public function activation($token, EterUserRepository $entityRepo, EntityManagerInterface $manager){

        $inProgress = false;
        // On vérifie si un utilisateur a ce token
        $user = $entityRepo->findOneBy(['activation_token' => $token]);

        //Si aucun utilisateur n'existe avec ce token
        if(!$user){
            //Erreur 404
            throw $this->createNotFoundException('Cet utilisateur n\'existe pas');
        }

        // On supprime le token
        $user->setActivationToken(null);
        $manager->persist($user);
        $manager->flush();

        //On envoie un message flash
        $this->addFlash('success', 'Votre compte a bien été activé');

        //On retourne à l'accueil
        return $this->redirectToRoute('home', [
            'inProgress' => $inProgress,
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
        if($error){
            $this->addFlash('danger', 'Cet email n\'existe pas ou le mot de passe est erroné');
            return $this->render('home/index.html.twig', [
                'error' => $error,
                'inProgress' => $inProgress
            ]);
        }
        else{

            return $this->render('security/login.html.twig', [
                'last_username' => $lastUsername,
                'error' => $error,
                'inProgress' => $inProgress
            ]);
        }
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout() {

    }

    /**
     * @Route("/forgot_password", name="app_forgotten_password")
     * @param Request $request
     * @param EterUserRepository $entityRepo
     * @param MailerInterface $mailer
     * @param TokenGeneratorInterface $tokenGenerator
     * @param EntityManagerInterface $manager
     * @return RedirectResponse|Response
     * @throws TransportExceptionInterface
     */
    public function forgottenPass(Request $request, EterUserRepository $entityRepo, MailerInterface $mailer,
                                  TokenGeneratorInterface $tokenGenerator, EntityManagerInterface $manager){
        $inProgress = false;
        //Création du formulaire
        $form = $this->createForm(ResetPassType::class);

        //Traitement du formulaire
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $data= $form->getData();

            //Recherche de l'utilisateur avec cet email
            $user = $entityRepo->findOneBy(['user_mail' => $data]);

            //Si l'utilisateur n'existe pas
            if(!$user){
                // Envoi d'un message flash
                $this->addFlash('danger', 'Cette adresse n\'existe pas');

                return $this->redirectToRoute('home', [
                    'inProgress' => $inProgress
                ]);
            }

            // Génération d'un token
            $token = $tokenGenerator->generateToken();

            try{
                $user->setResetToken($token);
                $manager->persist($user);
                $manager->flush();
            }catch(\Exception $e){
                $this->addFlash('warning', 'Une erreur est survenue : '. $e->getMessage());

                return $this->redirectToRoute('home', [
                    'inProgress' => $inProgress
                ]);
            }

            /*Génération de l'URL de réinitialisation du mot de passe
            $url = $this->GenerateUrl('app_reset_password', ['token' => $token],
                UrlGeneratorInterface::ABSOLUTE_URL);*/

            //Envoi du message
            $mail = $user->getUserMail();

            $email = (new TemplatedEmail())
                ->from('contact@eterelz.org')
                ->to($mail)
                ->subject('Réinitialisation du mot de passe')
                ->htmlTemplate('emails/reset_password.html.twig')
                ->context([
                    'username' => $user->getUserLogin(),
                    'token' => $user->getResetToken()
                ]);

            //Envoi de l'email
            $mailer->send($email);

            //Création du message Flash
            $this->addFlash('success', 'Un email de réinitialisation vous a été envoyé');

            return $this->redirectToRoute('home', [
                'inProgress' => $inProgress
            ]);
        }
        // Envoi vers la page de demande de l'email
        return $this->render('security/forgotten_password.html.twig', [
            'emailForm' => $form->createView(),
            'inProgress' => $inProgress
            ]);
    }

    /**
     * @Route("/reset_password/{token}", name="app_reset_password")
     * @param $token
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @param EntityManagerInterface $manager
     * @return Response
     */
    public function resetPassword($token, Request $request, UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $manager){
        $inProgress = false;
        // Recherche de l'utilisateur avec le token fourni
        $user = $this->getDoctrine()->getRepository(EterUser::class)->findOneBy(['reset_token' => $token]);

        if(!$user){
            $this->addFlash('danger', 'Token inconnu');
            return $this->redirectToRoute('home',[
                'inProgress' => $inProgress]);
        }

        // Si le formulaire est envoyé en méthode POST
        if($request->isMethod('POST')){

            //On supprime le token
            $user->setResetToken(null);

            //On crypte le mot de passe
            $user->setUserPassword($passwordEncoder->encodePassword($user, $request->request->get('password')));
            $manager->persist($user);
            $manager->flush();

            $this->addFlash('success', 'Mot de passe modifié avec succès');

            return $this->redirectToRoute('home',[
                'inProgress' => $inProgress]);
        }
        else{
            return $this->render('security/reset_password.html.twig', ['token' => $token, 'inProgress' => $inProgress]);
        }
    }
}