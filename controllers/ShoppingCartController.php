<?php
    require_once __DIR__ . '/../models/User.php';
    require_once __DIR__ . '/../models/Product.php';
    require_once __DIR__ . '/../models/ShoppingCart.php';

    class ShoppingCartController {
        public function shoppingCartPage() {
            if (!isset($_SESSION)) {
                session_start();
            }

            if (!isset($_SESSION['shoppingCart'])) {
                $_SESSION['shoppingCart'] = serialize(new ShoppingCart());
            }

            $shoppingCart = unserialize($_SESSION['shoppingCart']);

            $products = $shoppingCart->getProducts();

            $shoppingCart->setTotalValue($this->getShoppingCartTotalValue($products));

            $_SESSION['shoppingCart'] = serialize($shoppingCart);

            $products = $products;
            $productsNumber = $this->getShoppingCartProductQuantity($products);

            $total = $shoppingCart->getTotalValue();

            include_once __DIR__ . '/../views/shoppingCart.php';
        }

        public function invoicePage() {
            if (!isset($_SESSION)) {
                session_start();
            }

            $shoppingCart = unserialize($_SESSION['shoppingCart']);
            
            $user = unserialize($_SESSION['user']);
            $products = $shoppingCart->getProducts();
            $total = $shoppingCart->getTotalValue();

            unset($_SESSION['shoppingCart']);

            include_once __DIR__ . '/../views/invoice.php';
        }

        public function addProduct(): void {
            if (!isset($_SESSION)) {
                session_start();
            }

            $shoppingCart = unserialize($_SESSION['shoppingCart']);
            $products = $shoppingCart->getProducts();

            $productId = $_POST['productId'];

            if (!isset($products[$productId])) {
                $product = unserialize($_SESSION['products'][$productId]);
                $product->setQuantity(1);
                $shoppingCart->addProduct($product);
            }
            else {
                $product = $products[$productId];
                $product->setQuantity($product->getQuantity() + 1);
            }

            $_SESSION['shoppingCart'] = serialize($shoppingCart);

            $this->calculateProductSubtotal($productId);
        }

        public function removeProduct(): void {
            if (!isset($_SESSION)) {
                session_start();
            }

            $shoppingCart = unserialize($_SESSION['shoppingCart']);
            $shoppingCart->removeProduct($_POST['productId']);

            $_SESSION['shoppingCart'] = serialize($shoppingCart);
        }

        public function updateQuantity(): void {
            if (!isset($_SESSION)) {
                session_start();
            }

            $shoppingCart = unserialize($_SESSION['shoppingCart']);
            $products = $shoppingCart->getProducts();

            $productId = $_POST['productId'];

            $product = $products[$productId];

            $product->setQuantity(intval($_POST['quantity']));

            $products[$productId] = $product;

            $_SESSION['shoppingCart'] = serialize($shoppingCart);

            $this->calculateProductSubtotal($productId);
        }

        private function getShoppingCartTotalValue(array $products) {
            $totalValue = 0;

            foreach ($products as $productId => $product) {
                $totalValue += $product->getSubtotal();
            }

            return $totalValue;
        }

        private function getShoppingCartProductQuantity(array $products): int {
            $quantity = 0;

            foreach ($products as $productId => $product) {
                $quantity += $product->getQuantity();
            }

            return $quantity;
        }

        private function calculateProductSubtotal(string $productId): void {
            $shoppingCart = unserialize($_SESSION['shoppingCart']);
            $products = $shoppingCart->getProducts();
            $product = $products[$productId];
            $product->setSubtotal($product->getQuantity() * $product->getPrice());

            $products[$productId] = $product;

            $_SESSION['shoppingCart'] = serialize($shoppingCart);
        }
    }
?>