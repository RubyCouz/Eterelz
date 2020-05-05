<?php

namespace App\Controller;

use App\Entity\EterUser;
use App\Form\EterUserType;
use App\Repository\EterUserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/eteruser")
 */

class EterUserController extends AbstractController
{
    /**
     * @Route("/", name="eter_user_index", methods={"GET"})
     */
    public function index(EterUserRepository $eterUserRepository): Response
    {
        $inProgress = false;
        return $this->render('eter_user/index.html.twig', [
            'eter_users' => $eterUserRepository->find($id),
            'inProgress' => $inProgress
        ]);
    }

    /**
     * @Route("/new", name="eter_user_new", methods={"GET","POST"})
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
     */
    public function edit(Request $request, EterUser $eterUser): Response
    {
        $inProgress = false;
        $form = $this->createForm(EterUserType::class, $eterUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('eter_user_index');
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