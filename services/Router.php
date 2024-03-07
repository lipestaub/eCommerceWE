<?php
    namespace services;

    use controllers;

    class Router
    {
        private array $routes;

        public function __construct()
        {
            $this->routes = [
                'GET' => [
                    '/' => 'UserController@signInPage',
                    '/sign-in' => 'UserController@signInPage',
                    '/sign-out' => 'UserController@signOut',
                    '/shopping-cart' => 'ShoppingCartController@shoppingCartPage',
                ],
                'POST' => [
                    '/sign-in' => 'UserController@verifyUser',
                    '/products' => 'ProductController@productspage',
                    '/add-product' => 'ShoppingCartController@addProduct',
                    '/remove-product' => 'ShoppingCartController@removeProduct',
                ]
            ];
        }

        public function getResponse(RequestECommerce $request)
        {
            if (isset($this->routes[$request->getMethod()][$request->getRoute()])) {
                $controllerInfo = explode('@', $this->routes[$request->getMethod()][$request->getRoute()]);
                
                $controllerName = $controllerInfo[0];
                $controllerMethod = $controllerInfo[1];
                                            
                $controller = new $controllerName();
            
                $controller->$controllerMethod();
            } 
            else {
                header("HTTP/1.0 404 Not Found");
                echo '404 - Page not found';
            }
        }
    }
?>