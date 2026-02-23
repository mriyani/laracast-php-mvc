<?php

use Core\Response;

function dd($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';

    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = Response::HTTP_NOT_FOUND)
{
    http_response_code($code);
    require basePath("views/{$code}.php");
    die();
}

function authorize($condition, $statusCode = Response::HTTP_FORBIDDEN)
{
    if (! $condition) {
        abort($statusCode);
    }
}

function basePath($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);

    require basePath('views/' . $path);
}
