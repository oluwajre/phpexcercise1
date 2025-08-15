<?php

require 'Core/Middleware/Middleware.php';

class Router {

    protected $routes = [];

    public function add($uri, $controller, $method) {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => strtoupper($method),
            'middleware' => ''
        ];

        return $this;
    }

    public function get($uri, $controller) {

        return $this->add($uri, $controller, 'GET');
    }

    public function post($uri, $controller) {

        return $this->add($uri, $controller, 'POST');
    }

    public function delete($uri, $controller) {

        return $this->add($uri, $controller, 'DELETE');
    }

    public function patch($uri, $controller) {

        return $this->add($uri, $controller, 'PATCH');
    }

    public function put($uri, $controller) {

        return $this->add($uri, $controller, 'PUT');
    }

    public function only($key) {
        // Get the index of the last route in the array
        $lastIndex = array_key_last($this->routes);

        if ($lastIndex !== null) {
            $this->routes[$lastIndex]['middleware'] = $key;
        }

        return $this; // Optional: allows method chaining
    }

    public function route($uri, $method) {

        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {

                Middleware::resolve($route['middleware']);


                require $route['controller'];
                return;
            }
        }

        http_response_code(404);
        echo "404 Not Found";
        exit;

    }
};