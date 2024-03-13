<?php
    require_once __DIR__ . '/../models/Product.php';

    class ShoppingCart {
        private float $totalValue = 0;
        private array $products = [];

        public function getTotalValue(): float {
            return $this->totalValue;
        }

        public function getProducts(): array {
            return $this->products;
        }

        public function setTotalValue(float $totalValue): void {
            $this->totalValue = $totalValue;
        }

        public function addProduct(Product $product): void {
            $this->products[$product->getId()] = $product;
        }

        public function removeProduct(string $productId): void {
            unset($this->products[$productId]);
        }
    }
?>