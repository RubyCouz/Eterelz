<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController {
    /**
     * @Route("/login", name="login")
     * @return Response
     */
    public function login() {
        $inProgress = false;
        return $this->render('security/login.html.twig', [
            'inProgress' => $inProgress
        ]);
    }
}