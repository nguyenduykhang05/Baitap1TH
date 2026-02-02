<?php
require_once 'app/models/ProductModel.php';

class CartController
{
    private $products = [];

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        // Load products from session to find details
        if (isset($_SESSION['products'])) {
            $this->products = $_SESSION['products'];
        }

        // Initialize cart if not exists
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    public function index()
    {
        $cartItems = [];
        $totalParam = 0;

        foreach ($_SESSION['cart'] as $id => $quantity) {
            $product = $this->findProductById($id);
            if ($product) {
                $cartItems[] = [
                    'product' => $product,
                    'quantity' => $quantity,
                    'total' => $product->getPrice() * $quantity
                ];
                $totalParam += $product->getPrice() * $quantity;
            }
        }

        include 'app/views/cart/index.php';
    }

    public function add($id)
    {
        if (!isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id] = 1;
        } else {
            $_SESSION['cart'][$id]++;
        }
        
        header('Location: /project1/Cart/index');
        exit();
    }

    public function remove($id)
    {
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        }
        
        header('Location: /project1/Cart/index');
        exit();
    }

    public function checkout()
    {
        if (empty($_SESSION['cart'])) {
            header('Location: /project1/Cart/index');
            exit();
        }
        include 'app/views/cart/checkout.php';
    }

    public function processOrder()
    {
        // Simulate order processing
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Save order to session (optional, for history)
            $order = [
                'id' => uniqid(),
                'date' => date('Y-m-d H:i:s'),
                'customer' => [
                    'name' => $_POST['fullname'],
                    'phone' => $_POST['phone'],
                    'address' => $_POST['address']
                ],
                'items' => $_SESSION['cart']
            ];
            
            $_SESSION['orders'][] = $order;
            
            // Clear cart
            unset($_SESSION['cart']);
            
            // Redirect
            include 'app/views/cart/order_success.php';
            exit();
        }
    }

    private function findProductById($id)
    {
        foreach ($this->products as $product) {
            if ($product->getID() == $id) {
                return $product;
            }
        }
        return null;
    }
}
