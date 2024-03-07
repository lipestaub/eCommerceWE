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
                    '/shopping-cart' => 'ProjectController@projectsPage',
                ],
                'POST' => [
                    '/sign-in' => 'UserController@validateEmailAndPassword',
                    '/products' => 'UserController@createUser',
                    '/add-product' => 'ProjectController@createProject',
                    '/remove-product' => 'TaskController@createTask',
                ]
            ];
        }

        public function getResponse(Request $request)
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
                echo '404 - Page not found';
            }
        }
    }
?>