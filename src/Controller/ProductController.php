<?php

namespace App\Controller;

use App\Repository\EterProductRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="product_index")
     */
    public function index(EterProductRepository $eterProductRepository )
    {
        $inProgress = false;
        return $this->render('product/list.html.twig', [
            'products' => $eterProductRepository->findAll(),
            'inProgress' => $inProgress
        ]);
    }
}
