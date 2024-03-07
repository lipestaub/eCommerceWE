<?php
    class ShoppingCartController {
        public function addProduct(): void {
            if (!isset($_SESSION)) {
                session_start();
            }

            if (!isset($_SESSION['shoppingCart'])) {
                $_SESSION['shoppingCart'] = [];
            }

            if (!isset($_SESSION['shoppingCart'][$_POST['idproduto']])) {
                array_push($_SESSION['shoppingCart'], [
                    $_POST['idproduto'] => [
                        'description' => $_POST['dscproduto'],
                        'price' => $_POST['preco'],
                        'image' => $_POST['imagem'],
                        'quantity' => 1
                    ]
                ]);
            }
            else {
                $_SESSION['shoppingCart'][$_POST['idproduto']]['quantity'] += 1;
            }
        }

        public function removeProduct(): void {
            if (!isset($_SESSION)) {
                session_start();
            }

            unset($_SESSION['shoppingCart'][$_POST['idproduto']]['quantity']);
        }

        public function updateQuantity(): void {
            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['shoppingCart'][$_POST['idproduto']]['quantity'] = $_POST['quantity'];
        }
    }
?>