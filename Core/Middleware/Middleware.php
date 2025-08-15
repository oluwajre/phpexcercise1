<?php

class Middleware {
    public const MAP = [
        'guest' => [
            'class' => Guest::class,
            'path' => 'Core/Middleware/Guest.php'
        ],
        'auth' => [
            'class' => Auth::class,
            'path' => 'Core/Middleware/Auth.php'
        ],
    ];


    public static function resolve($key) {

        if (!$key) {
            return;
        }

        $middleware = static::MAP[$key];

        if (!$middleware) {
            throw new \Exception("Middleware not found: {$key}");
        }

        require $middleware['path'];

        (new $middleware['class'])->handle();
    }
}
