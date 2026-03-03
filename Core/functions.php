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

function login($user): void
{
    $_SESSION['user'] = [
        'email' => $user['email']
    ];

    session_regenerate_id(true);
}

function logout(): void
{
    $_SESSION = [];
    session_destroy();

    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}
