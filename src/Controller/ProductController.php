<?php

namespace App\Controller;

use App\Repository\EterProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product_index")
     * @param EterProductRepository $eterProductRepository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(EterProductRepository $eterProductRepository)
    {
        $inProgress = false;
        return $this->render('product/list.html.twig', [
            'products' => $eterProductRepository->findAll(),
            'inProgress' => $inProgress
        ]);
    }
}

