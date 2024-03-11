<?php
    class ShoppingCartController {
        public function shoppingCartPage() {
            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['shoppingCart']['total'] = 0;

            foreach ($_SESSION['shoppingCart']['products'] as $productId => $product) {
                $_SESSION['shoppingCart']['total'] += $_SESSION['shoppingCart']['products'][$productId]['subtotal'];
            }

            $products = $_SESSION['shoppingCart']['products'];
            $productsNumber = count($products);
            $total = $_SESSION['shoppingCart']['total'];

            include_once __DIR__ . '/../views/shoppingCart.php';
        }

        public function invoicePage() {
            $products = $_SESSION['shoppingCart']['products'];
            $productsNumber = count($products);
            $total = $_SESSION['shoppingCart']['total'];

            include_once __DIR__ . '/../views/invoice.php';
        }

        public function addProduct(): void {
            if (!isset($_SESSION)) {
                session_start();
            }

            if (!isset($_SESSION['shoppingCart']['products'])) {
                $_SESSION['shoppingCart']['products'] = [];
            }

            $productId = $_POST['productId'];

            if (!isset($_SESSION['shoppingCart']['products'][$productId])) {
                $_SESSION['shoppingCart']['products'][$productId] = [
                    'description' => $_SESSION['products'][$productId]['description'],
                    'price' => $_SESSION['products'][$productId]['price'],
                    'image' => $_SESSION['products'][$productId]['image'],
                    'quantity' => 1
                ];
            }
            else {
                $_SESSION['shoppingCart']['products'][$productId]['quantity'] += 1;
            }

            $_SESSION['shoppingCart']['products'][$productId]['subtotal'] = floatval($_SESSION['shoppingCart']['products'][$productId]['price']) * $_SESSION['shoppingCart']['products'][$productId]['quantity'];
        }

        public function removeProduct(): void {
            if (!isset($_SESSION)) {
                session_start();
            }

            unset($_SESSION['shoppingCart']['products'][$_POST['productId']]);
        }

        public function updateQuantity(): void {
            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['shoppingCart']['products'][$_POST['productId']]['quantity'] = $_POST['quantity'];
        }
    }
?>