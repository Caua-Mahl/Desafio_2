<?php 
    class Requisiçao {
        private  string $method;
        private string $route;


        public function __construct($method, $route) {
            $this->method = $method;
            $this->route  = $route;
        }

        public function getMethod() {
            return $this->method;
        }

        public function getRoute() {
            return $this->route;
        }
    }
?>