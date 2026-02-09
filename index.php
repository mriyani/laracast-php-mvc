<?php

require 'functions.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// dd($uri);

$routes = [
    '/'        => 'controllers/index.php',
    '/about'   => 'controllers/about.php',
    '/contact' => 'controllers/contact.php',
];

if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    http_response_code(404);
    require 'controllers/404.php'; // optional
}
