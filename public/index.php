<?php

use Core\Router;

// Define the base path to the application project directory (LARACAST-PHP-MVC) as the current root directory is public/index.php
const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';

// Autoload classes using PSR-4 autoloading standard
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require basePath("{$class}.php");
});

// Create a new Router instance
$router = new Router();

// Load routes from the routes.php file
$routes = require basePath('routes.php');

// Get the current request URI and HTTP method from the server variables
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

// Get the HTTP method (GET, POST, DELETE, etc.) from the server variables
$method = isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD'];

// Route the incoming request to the appropriate controller based on the URI and HTTP method
$router->route($uri, $method);
