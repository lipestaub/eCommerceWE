<?php
    namespace services;

    class RequestWE
    {
        private string $apiBase = 'https://ah.we.imply.com/';

        public function getUserByEmailAndCPF(string $email, string $cpf) {
            $data = json_encode([
                'email' => $email,
                'cpf' => $cpf
            ]);

            $curl = curl_init();
            curl_setopt_array($curl, [
                CURLOPT_URL => $this->apiBase . 'products',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $data,
                CURLOPT_HTTPHEADER => [
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($data)
                ]
            ]);

            var_dump(curl_exec($curl));

            /*$response = curl_exec($curl);

            $decoded = json_decode($response, true);

            return $decoded['results'][0];*/
        }
    }
?>