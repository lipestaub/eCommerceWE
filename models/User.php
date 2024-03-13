<?php
    class User {
        private string $id;
        private string $name;
        private string $cpf;
        private string $email;

        public function __construct(string $id, string $name, string $cpf, string $email) {
            $this->id = $id;
            $this->name = $name;
            $this->cpf = $cpf;
            $this->email = $email;
        }

        public function getId(): string {
            return $this->id;
        }

        public function getName(): string {
            return $this->name;
        }

        public function getCpf(): string {
            return $this->cpf;
        }

        public function getEmail(): string {
            return $this->email;
        }
    }
?>