<?php

namespace App\Controller;

use App\Repository\EterProductRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CartController extends AbstractController
{
    /**
     * @Route("/panier", name="cart_index")
     * @param SessionInterface $session
     * @param EterProductRepository $eterProductRepository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(SessionInterface $session, EterProductRepository $eterProductRepository)
    {
        $inProgress = false;

        //On recherche les produits rajoutés par l'utilisateur dans le panier, si le panier est vide, cela sera représenté par un tableau vide
        $panier = $session->get('panier', []);

        //Nouveau tableau contenant toutes les données du produit
        $panierWithData = [];


        //On boucle sur le panier et on extrait à chaque fois l'id et la quantité du panier
        foreach($panier as $id => $quantity)
        {
            //Récupération des données, dans chaque case du tableau associatif, un nouveau produit sera instauré
            $panierWithData[] = [
                'product' => $eterProductRepository->find($id),
                'quantity' => $quantity,
                //'inProgress' => $inProgress
            ];
        }

        //On instaure une variable avec un entier commençant à 0
        $total = 0;

        //A chaque produit, on multiplie le prix du produit par la quantité de celui-ci
        foreach($panierWithData as $item)
        {
            $totalItem = $item['product']->getProductPrice() * $item['quantity'];
            //Le total final sera l'accumulation de cette opération
            $total += $totalItem;
        }

        return $this->render('cart/cart.html.twig', [
            'items' => $panierWithData,
            'total' => $total,
            'inProgress' => $inProgress
        ]);
    }

    /**
     * @Route("/panier/add{id}", name="cart_add")
     * @param $id
     * @param SessionInterface $session
     * @return RedirectResponse
     */
    public function add($id, SessionInterface $session)
    {
        $inProgress = false;

        //Dans la session, on recherche une donnée qui s'appelle 'panier',
        // s'il n'y en a pas, alors on instaure un tableau vide
        $panier = $session->get('panier', []);

        // Si le produit et son id est déjà dans le panier, alors on rajoute
        //Si le produit n'est pas dans le panier, alors on en ajoute un
        if(!empty($panier[$id]))
        {
            $panier[$id]++;
        }
        else
        {
            $panier[$id] = 1;
        }

        //Sauvegarde les produits déjà dans le panier
        $session->set('panier', $panier);

        return$this->redirectToRoute("cart_index", [
            'inProgress' => $inProgress
        ]);
    }

    /**
     * @Route("/panier/remove{id}", name="cart_remove")
     * @param $id
     * @param SessionInterface $session
     * @return RedirectResponse
     */
    public function remove($id, SessionInterface $session) {
        $inProgress = false;
        $panier = $session->get('panier', []);

        if(!empty($panier[$id]))
        {
            unset($panier[$id]);
        }

        $session->set('panier', $panier);

        return$this->redirectToRoute("cart_index", [
            'inProgress' => $inProgress
        ]);
    }
}

