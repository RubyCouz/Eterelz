<?php

// Vidéo LIOR CHAMLA : Symfony et la session (on crée un panier e-commerce)

namespace App\Controller;
use App\Repository\EterUserRepository;
use App\Repository\EterProductRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CartController extends AbstractController
{
    
    /**
     * @Route("/panier", name="cart_index")
     */
    public function index(SessionInterface $session, EterProductRepository $eterProductRepository)
    {
        $inProgress = false;
        // On va chercher les produits ajoutés par l'utilisateur dans le panier. Si le panier est vide, il est représenté par un tableau vide
        $panier = $session->get('panier', []);
        // Au départ le panier est vide et on va ajouter des produits
        $panierWithData = [];
        // On boucle sur le panier et à chaque fois on extrait l'identifiant du produit et la quantité qui correspond
        foreach($panier as $id => $quantity)
        {
            $panierWithData[] = [
                'product' => $eterProductRepository->find($id), // On trouve un produit grâce à son identifiant et on récupère toutes les infos relatives au produit
                'quantity' => $quantity, // On récupère la quantité
                'inProgress' => $inProgress
            ];
        }
        $total = 0;
        foreach($panierWithData as $item) // On boucle sur le panier pour faire des calculs
        {
            $totalItem = $item['product']->getProductPrice() * $item['quantity'];
            $total += $totalItem;
        }
        return $this->render('cart/cart.html.twig', [
            'items' => $panierWithData, // Liste des élèments
            'total' => $total, // Prix total du panier
            'inProgress' => $inProgress
        ]);
    }

    /**
     * @Route("/panier/add{id}", name="cart_add")
     */
    public function add($id, SessionInterface $session)
    {
        $inProgress = false;
        // On va chercher les produits ajoutés par l'utilisateur dans le panier. Si le panier est vide, il est représenté par un tableau vide
        $panier = $session->get('panier', []);
        if(!empty($panier[$id])) // Si on a déjà un produit avec cet identifiant dans le panier
        {
            $panier[$id]++; // Je le rajoute
        }
        else
        {
            $panier[$id] = 1; // Sinon il est égal à 1
        }
        $session->set('panier', $panier); // On sauvegarde l'état actuel du panier dans la session
        return $this->redirectToRoute("cart_index", [ // Et je retourne à la liste
            'inProgress' => $inProgress
        ]);
    }

    /**
     * @Route("/panier/remove{id}", name="cart_remove")
     */
    public function remove($id, SessionInterface $session) {
        $inProgress = false;
        // On va chercher les produits ajoutés par l'utilisateur dans le panier. Si le panier est vide, il est représenté par un tableau vide
        $panier = $session->get('panier', []);
        if(!empty($panier[$id])) // Si l'identifiant du produit existe
        {
            unset($panier[$id]); // Alors je le supprime
        }
        $session->set('panier', $panier); // On remet à jour le panier
        return$this->redirectToRoute("cart_index", [ // Et je retourne à la liste
            'inProgress' => $inProgress
        ]);
    }

}