<?php

session_start();

require "Core/functions.php";

// Autoload classes
spl_autoload_register(function ($class) {

    require "Core/{$class}.php";
});

$router = new Router();

require "Core/routes.php";

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$method = $_POST['__request_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($path, $method);



