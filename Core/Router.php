<?php

class Router {

    protected $routes = [];

    public function add($uri, $controller, $method) {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => strtoupper($method)
        ];
    }

    public function get($uri, $controller) {

        $this->add($uri, $controller, 'GET');
    }

    public function post($uri, $controller) {

        $this->add($uri, $controller, 'POST');
    }

    public function delete($uri, $controller) {

        $this->add($uri, $controller, 'DELETE');
    }

    public function patch($uri, $controller) {

        $this->add($uri, $controller, 'PATCH');
    }

    public function put($uri, $controller) {

        $this->add($uri, $controller, 'PUT');
    }

    public function route($uri, $method) {

        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                require $route['controller'];
                return;
            }
        }

        http_response_code(404);
        echo "404 Not Found";
        exit;

    }
};