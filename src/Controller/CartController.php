<?php
namespace App\Controller;
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
        $panier = $session->get('panier', []);
        $panierWithData = [];
        foreach($panier as $id => $quantity)
        {
            $panierWithData[] = [
                'product' => $eterProductRepository->find($id),
                'quantity' => $quantity,
                'inProgress' => $inProgress
            ];
        }
        $total = 0;
        foreach($panierWithData as $item)
        {
            $totalItem = $item['product']->getProductPrice() * $item['quantity'];
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
     */
    public function add($id, SessionInterface $session)
    {
        $inProgress = false;
        $panier = $session->get('panier', []);
        if(!empty($panier[$id]))
        {
            $panier[$id]++;
        }
        else
        {
            $panier[$id] = 1;
        }
        $session->set('panier', $panier);
        return$this->redirectToRoute("cart_index", [
            'inProgress' => $inProgress
        ]);
    }
    /**
     * @Route("/panier/remove{id}", name="cart_remove")
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