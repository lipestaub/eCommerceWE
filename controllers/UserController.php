<?php
    namespace controllers;
    
    class User {
        private ?string $email;
        private ?string $cpf;

        public function __construct(?string $email = null, ?string $cpf = null)
        {
            $this->email = $email;
            $this->cpf = $cpf;
        }

        public function verifyUser() {
            $email = $_POST['email'];
            $cpf = $_POST['cpf'];

            
        }
    }