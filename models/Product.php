<?php
    class Product {
        private string $id;
        private string $description;
        private float $price;
        private string $image;
        private ?int $quantity;
        private ?float $subtotal;

        public function __construct(string $id, string $description, float $price, string $image, ?int $quantity = null, ?float $subtotal = null) {
            $this->description = $description;
            $this->price = $price;
            $this->image = $image;
            $this->quantity = $quantity;
            $this->subtotal = $subtotal;
        }

        public function getId(): string {
            return $this->id;
        }

        public function getDescription(): string {
            return $this->description;
        }

        public function getPrice(): float {
            return $this->price;
        }

        public function getImage(): string {
            return $this->image;
        }

        public function getQuantity(): int {
            return $this->quantity;
        }

        public function getSubtotal(): float {
            return $this->subtotal;
        }

        public function setQuantity(int $quantity) {
            $this->quantity = $quantity;
        }

        public function setSubtotal(float $subtotal) {
            $this->subtotal = $subtotal;
        }
    }
?>