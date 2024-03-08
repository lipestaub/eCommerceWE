<?php
    require_once __DIR__ . '/../services/RequestWE.php';

    class ProductController {
        public function productsPage() {
            if (!isset($_SESSION)) {
                session_start();
            }

            session_destroy();
            session_start();

            if (!isset($_SESSION['products'])) {
                $requestWE = new RequestWE();

                foreach ($requestWE->getProducts() as $product) {
                    $products[$product['idproduto']] = [
                        'description' => $product['dscproduto'],
                        'price' => floatval($product['preco']),
                        'image' => $product['imagem'] ?? '../public/images/defaultProdutImage.png'
                    ];
                }

                $_SESSION['products'] = $products;
            }

            $productsPerPage = 15;

            $offset = $_SESSION['page'] === 1 ? 0 : $_SESSION['page'] * $productsPerPage;

            $products = array_slice($_SESSION['products'], $offset, $productsPerPage);

            include_once __DIR__ . '/../views/products.php';
        }
    }
?>