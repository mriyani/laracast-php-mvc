<?php

use Core\App;
use Core\Container;
use Core\Database;

// Database connection
$container = new Container();

$container->bind('Core\Database', function () {
    $config = require basePath('config.php');

    // Create database instance 
    return new Database($config['database']);
});

App::setContainer($container);
