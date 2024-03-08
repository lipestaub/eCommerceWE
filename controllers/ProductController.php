<?php
    require_once __DIR__ . '/../services/RequestWE.php';

    class ProductController {
        public function productsPage() {
            #$requestWE = new RequestWE();
            #$products = $requestWE->getProducts();

            

            $offset = $_POST['page'] === 1 ? 0 : $_POST['page'] * 15;
        }
    }
?>