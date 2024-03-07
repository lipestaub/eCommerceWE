<?php
    require_once __DIR__ . '/../services/RequestWE.php';

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
                $this->saveUserData($email, $cpf, $userData);

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

        private function saveUserData(string $email, string $cpf, array $userData): void {
            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['user'] = [
                'id' => $userData['idpessoa'],
                'name' => $userData['nome'],
                'email' => $email,
                'cpf' => $cpf
            ];
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