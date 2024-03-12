<?php
    require_once './services/Router.php';

    $router = new Router();    
    $router->getResponse($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
?>