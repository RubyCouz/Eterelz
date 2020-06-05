<?php

namespace App\Controller;

use App\Entity\EterUser;
use App\Form\EterUserType;
use App\Repository\EterUserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

/**
 * @Route("/eteruser")
 */

class EterUserController extends AbstractController
{
    /**
     * @Route("/", name="eter_user_index", methods={"GET"})
     * @param EterUserRepository $eterUserRepository
     * @return Response
     */
    public function index(EterUserRepository $eterUserRepository): Response
    {
        $inProgress = false;
        return $this->render('eter_user/index.html.twig', [
            'eter_users' => $eterUserRepository->findAll(),
            'inProgress' => $inProgress
        ]);
    }

    /**
     * @Route("/new", name="eter_user_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $inProgress = false;
        $eterUser = new EterUser();
        $form = $this->createForm(EterUserType::class, $eterUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($eterUser);
            $entityManager->flush();

            return $this->redirectToRoute('eter_user_index');
        }

        return $this->render('eter_user/new.html.twig', [
            'eter_user' => $eterUser,
            'form' => $form->createView(),
            'inProgress' => $inProgress
        ]);
    }

    /**
     * @Route("/{id}", name="eter_user_show", methods={"GET"})
     * @param EterUser $eterUser
     * @return Response
     */
    public function show(EterUser $eterUser): Response
    {
        $inProgress = false;

        return $this->render('eter_user/show.html.twig', [
            'eter_user' => $eterUser,
            'inProgress' => $inProgress
        ]);
    }

    /**
     * @Route("/{id}/edit", name="eter_user_edit", methods={"GET","POST"})
     * @param Request $request
     * @param EterUser $eterUser
     * @param SluggerInterface $slugger
     * @return Response
     */
    public function edit(Request $request, EterUser $eterUser, SluggerInterface $slugger): Response
    {
        $inProgress = false;

        //Création du formulaire à partir du formulaire type EterUserType
        $form = $this->createForm(EterUserType::class, $eterUser);

        //Paramétrage de l'acceptation des requêtes SQL
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            //Récupération des données du fichier uploadé
            $avatarFile = $form['user_avatar']->getData();

            //Si un fichier a été déposé
            if ($avatarFile) {

                //Récupération du nom du fichier original
                $originalFilename = pathinfo($avatarFile->getClientOriginalName(), PATHINFO_FILENAME);

                //Sécurisation du nom de fichier
                $safeFilename = $slugger->slug($originalFilename);

                //Nouveau nom du fichier et ajout de l'extension
                $newFilename = $safeFilename.'-'.uniqid().'.'.$avatarFile->guessExtension();

                //Indication du nouveau nom de fichier
                $eterUser->setUserAvatar($newFilename);

                //Déplacement du fichier dans le dossier de destination
                try{
                    $avatarFile->move(
                        $this->getParameter('upload_directory'),
                        $newFilename
                    );
                }catch (FileException $e) {
                    //Possibilité d'indiquer un message d'erreur si l'upload échoue
                }
            }

            //Insertion dans la BDD
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('eter_user_show', ['id' => $eterUser->getId()]);
        }
        return $this->render('eter_user/edit.html.twig', [
            'eter_user' => $eterUser,
            'form' => $form->createView(),
            'inProgress' => $inProgress
        ]);
    }

    /**
     * @Route("/{id}", name="eter_user_delete", methods={"DELETE"})
     */
    public function delete(Request $request, EterUser $eterUser): Response
    {
        $inProgress = false;
        if ($this->isCsrfTokenValid('delete'.$eterUser->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($eterUser);
            $entityManager->flush();
        }

        return $this->redirectToRoute('eter_user_index');
    }
}
