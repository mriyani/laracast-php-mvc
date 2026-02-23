<?php

use Core\Response;

$routes = require basePath('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

function routeToControllers($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require basePath($routes[$uri]);
    } else {
        abort();
    }
}

function abort($code = Response::HTTP_NOT_FOUND)
{
    http_response_code($code);
    require basePath("views/{$code}.php");
    die();
}

routeToControllers($uri, $routes);
