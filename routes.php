<?php

$routes = [
    '/' => 'controller/index.php',
    '/notes' => 'controller/notes.php',
];

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Simple routing logic
if (array_key_exists($path, $routes)) {
    require $routes[$path];
} else {
    http_response_code(404);
    echo "404 Not Found";
};