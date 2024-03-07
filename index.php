<?php
    require_once './services/Request.php';
    require_once './services/Router.php';

    $request = new Request();

    $router = new Router();    
    $router->getResponse($request);
?>