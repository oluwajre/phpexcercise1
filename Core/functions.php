<?php

function urlIs($value) {
    $currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    return $currentPath === $value;
};

function authorize($condition, $status = 403) {
    if (!$condition) {
        http_response_code($status);
        exit;
    }
};