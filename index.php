<?php
    use services\RequestECommerce;
    use services\Router;

    $router = new Router();    
    $router->getResponse(new RequestECommerce());
?>