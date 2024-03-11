<?php
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
                    '/products' => 'ProductController@productsPage',
                    '/shopping-cart' => 'ShoppingCartController@shoppingCartPage'
                ],
                'POST' => [
                    '/sign-in' => 'UserController@verifyUser',
                    '/add-product' => 'ShoppingCartController@addProduct',
                    '/remove-product' => 'ShoppingCartController@removeProduct',
                    '/update-quantity' => 'ShoppingCartController@updateQuantity'
                ]
            ];
        }

        public function getResponse(RequestECommerce $request)
        {
            if (isset($this->routes[$request->getMethod()][$request->getRoute()])) {
                $controllerInfo = explode('@', $this->routes[$request->getMethod()][$request->getRoute()]);
                
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