<?php
    namespace services;

    class RequestECommerce
    {
        private string $method;
        private string $route;

        public function __construct()
        {
            $this->method = $_SERVER['REQUEST_METHOD'];
            $this->route = $_SERVER['REQUEST_URI'];
        }

        public function getMethod()
        {
            return $this->method;
        }

        public function getRoute()
        {
            return $this->route;
        }
    }
?>