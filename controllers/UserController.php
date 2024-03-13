<?php
    require_once __DIR__ . '/../services/RequestWE.php';
    require_once __DIR__ . '/../models/User.php';

    class UserController {
        public function signInPage() {
            if (!isset($_SESSION)) {
                session_start();
            }

            if (isset($_SESSION['user'])) {
                $this->redirectToProductsPage();
            }

            include_once __DIR__ . '/../views/signIn.html';
        }

        public function verifyUser() {
            $email = $_POST['email'];
            $cpf = $_POST['cpf'];

            $requestWE = new RequestWE();

            $userData = $requestWE->getUserByEmailAndCPF($email, $cpf);

            if ($userData) {
                if (!isset($_SESSION)) {
                    session_start();
                }
                
                $_SESSION['user'] = serialize(new User($userData['idpessoa'], $userData['nome'], $cpf, $email));

                $this->redirectToProductsPage();
            }

            $this->redirectToSignInPage();
        }

        public function signOut() {
            if (!isset($_SESSION)) {
                session_start();
            }

            if (isset($_SESSION['user'])) {
                unset($_SESSION['user']);
            }

            if (isset($_SESSION['shoppingCart'])) {
                unset($_SESSION['shoppingCart']);
            }

            $this->redirectToSignInPage();
        }

        private function redirectToProductsPage(): void {
            header('Location: /products');
            exit();
        }

        private function redirectToSignInPage(): void {
            header('Location: /sign-in');
            exit();
        }
    }
?>