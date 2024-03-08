<?php
    require_once __DIR__ . '/../services/RequestWE.php';

    class ProductController {
        public function productsPage() {
            if (!isset($_SESSION)) {
                session_start();
            }

            if (!isset($_SESSION['products'])) {
                $requestWE = new RequestWE();
                $products = $requestWE->getProducts();

                $_SESSION['products'] = array_map(function ($product) {
                    return [
                        $product['idproduto'] => [
                            'description' => $product['dscproduto'],
                            'price' => $product['preco'],
                            'image' => $product['imagem']
                        ]
                    ];
                }, $products);
            }

            $productsPerPage = 15;

            $offset = $_SESSION['page'] === 1 ? 0 : $_SESSION['page'] * $productsPerPage;

            $products = array_slice($_SESSION['products'], $offset, $productsPerPage);

            include_once __DIR__ . '/../views/products.php';
        }
    }
?>