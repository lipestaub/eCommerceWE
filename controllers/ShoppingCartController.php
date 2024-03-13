<?php
    require_once __DIR__ . '/../models/User.php';
    require_once __DIR__ . '/../models/Product.php';

    class ShoppingCartController {
        public function shoppingCartPage() {
            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['shoppingCart']['total'] = 0;

            foreach ($_SESSION['shoppingCart']['products'] as $productId => $product) {
                $_SESSION['shoppingCart']['total'] += unserialize($_SESSION['shoppingCart']['products'][$productId])->getSubtotal();;
            }

            $products = $_SESSION['shoppingCart']['products'];
            $productsNumber = count($products);
            $total = $_SESSION['shoppingCart']['total'];

            include_once __DIR__ . '/../views/shoppingCart.php';
        }

        public function invoicePage() {
            if (!isset($_SESSION)) {
                session_start();
            }
            
            $user = unserialize($_SESSION['user']);
            $products = $_SESSION['shoppingCart']['products'];
            $total = $_SESSION['shoppingCart']['total'];

            unset($_SESSION['shoppingCart']);

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
                $product = unserialize($_SESSION['products'][$productId]);
                $product->setQuantity(1);
            }
            else {
                $product = unserialize($_SESSION['shoppingCart']['products'][$productId]);
                $product->setQuantity($product->getQuantity() + 1);
            }

            $_SESSION['shoppingCart']['products'][$productId] = serialize($product);

            $this->calculateProductSubtotal($productId);
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

            $productId = $_POST['productId'];
            $product = unserialize($_SESSION['shoppingCart']['products'][$productId]);

            $product->setQuantity(intval($_POST['quantity']));

            $_SESSION['shoppingCart']['products'][$productId] = serialize($product);

            $this->calculateProductSubtotal($productId);
        }

        private function calculateProductSubtotal(string $productId): void {
            $product = unserialize($_SESSION['shoppingCart']['products'][$productId]);
            $product->setSubtotal($product->getQuantity() * $product->getPrice());

            $_SESSION['shoppingCart']['products'][$productId] = serialize($product);
        }
    }
?>