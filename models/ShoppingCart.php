<?php
    require_once __DIR__ . '/../models/Product.php';

    class ShoppingCart {
        private array $products = [];

        public function addProduct(Product $product): void {
            $this->products[$product->getId()] = $product;
        }

        public function removeProduct(string $productId): void {
            unset($this->products[$productId]);
        }

        public function getProducts(): array {
            return $this->products;
        }

        public function getQuantity(): int {
            $quantity = 0;

            array_map(function ($product) use ($quantity) {
                $quantity += $product->getQuantity();
            }, $this->products);

            return $quantity;
        }
    }
?>