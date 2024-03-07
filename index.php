<?php
    require_once './services/Router.php';
    require_once './services/RequestECommerce.php';

    $router = new Router();    
    $router->getResponse(new RequestECommerce());
?>