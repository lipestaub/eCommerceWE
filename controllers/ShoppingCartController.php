<?php
    class ShoppingCartController {
        public function shoppingCartPage() {
            if (!isset($_SESSION)) {
                session_start();
            }

            $products = $_SESSION['shoppingCart'];

            include_once __DIR__ . '/../views/shoppingCart.php';
        }

        public function addProduct(): void {
            if (!isset($_SESSION)) {
                session_start();
            }

            if (!isset($_SESSION['shoppingCart'])) {
                $_SESSION['shoppingCart'] = [];
            }

            $productId = $_POST['productId'];

            if (!isset($_SESSION['shoppingCart'][$productId])) {
                $_SESSION['shoppingCart'][$productId] = [
                    $_SESSION['products'][$productId],
                    'quantity' => 1
                ];
            }
            else {
                $_SESSION['shoppingCart'][$productId]['quantity'] += 1;
            }
        }

        public function removeProduct(): void {
            if (!isset($_SESSION)) {
                session_start();
            }

            unset($_SESSION['shoppingCart'][$_POST['productId']]);
        }

        public function updateQuantity(): void {
            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['shoppingCart'][$_POST['productId']]['quantity'] = $_POST['quantity'];
        }
    }
?>