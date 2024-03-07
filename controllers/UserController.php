<?php
    namespace controllers;

use services\RequestWE;

    class User {
        private array $users = [];

        public function verifyUser() {
            $email = $_POST['email'];
            $cpf = $_POST['cpf'];

            $requestWE = new RequestWE();

            $user = $requestWE->getUserByEmailAndCPF($email, $cpf);
        }
    }