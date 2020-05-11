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
        $form = $this->createForm(EterUserType::class, $eterUser);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $avatarFile = $form['user_avatar2']->getData();
            // this condition is needed because the 'brochure' field is not required
            // so the PDF file must be processed only when a file is uploaded
            if ($avatarFile) {
                $originalFilename = pathinfo($avatarFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$avatarFile->guessExtension();
                $eterUser->setUserAvatar($newFilename);
                // Move the file to the directory where brochures are stored
//                dump($newFilename);
//                dd($newFilename);
                try {
                    $avatarFile->move(
                        $this->getParameter('upload_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                    dd($e);
                }
                // updates the 'brochureFilename' property to store the PDF file name
                // instead of its contents
            }
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
