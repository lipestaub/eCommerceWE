<?php
    class Router
    {
        private array $routes;

        public function __construct() {
            $this->routes = [
                'GET' => [
                    '/' => 'UserController@signInPage',
                    '/sign-in' => 'UserController@signInPage',
                    '/sign-out' => 'UserController@signOut',
                    '/products' => 'ProductController@productsPage',
                    '/shopping-cart' => 'ShoppingCartController@shoppingCartPage',
                    '/invoice' => 'ShoppingCartController@invoicePage'
                ],
                'POST' => [
                    '/sign-in' => 'UserController@verifyUser',
                    '/add-product' => 'ShoppingCartController@addProduct',
                    '/remove-product' => 'ShoppingCartController@removeProduct',
                    '/update-quantity' => 'ShoppingCartController@updateQuantity'
                ]
            ];
        }

        public function getResponse(string $method, string $url): void {
            if (isset($this->routes[$method][$url])) {
                $controllerInfo = explode('@', $this->routes[$method][$url]);
                
                $controllerName = $controllerInfo[0];
                $controllerMethod = $controllerInfo[1];

                require_once __DIR__ . '/../controllers/' . $controllerName . '.php';
                                            
                $controller = new $controllerName();
            
                $controller->$controllerMethod();
            } 
            else {
                header("HTTP/1.0 404 Not Found");
            }
        }
    }
?>