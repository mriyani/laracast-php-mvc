<?php

use Core\Response;

function dd($value): never
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';

    die();
}

function urlIs($value): bool
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = Response::HTTP_NOT_FOUND): never
{
    http_response_code($code);
    require basePath("views/{$code}.php");
    die(); // Stop further execution after aborting
}

function authorize($condition, $statusCode = Response::HTTP_FORBIDDEN): void
{
    if (! $condition) {
        abort($statusCode);
    }
}

function basePath($path): string
{
    return BASE_PATH . $path;
}
function view($path, $attributes = []): void
{
    extract($attributes);
    require basePath('views/' . $path);
}
