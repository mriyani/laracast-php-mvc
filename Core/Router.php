<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
    protected $routes = [];

    // Helper method to set a route for a specific HTTP request method
    private function setRoute($uri, $controller, $method = 'GET')
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => strtoupper($method),
            'middleware' => null
        ];
        return $this;
    }

    // Get, Post, Delete, Patch, and Put methods to define routes for different HTTP request methods
    public function get($uri, $controller)
    {
        return $this->setRoute($uri, $controller, 'GET');
    }

    public function post($uri,  $controller)
    {
        return $this->setRoute($uri, $controller, 'POST');
    }

    public function delete($uri,  $controller)
    {
        return $this->setRoute($uri, $controller, 'DELETE');
    }

    public function patch($uri,  $controller)
    {
        return $this->setRoute($uri, $controller, 'PATCH');
    }

    public function put($uri,  $controller)
    {
        return $this->setRoute($uri, $controller, 'PUT');
    }

    function only($middleware)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $middleware;

        return $this;
    }

    // Route the incoming request to the appropriate controller
    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                // apply middleware if exists
                if ($route['middleware']) {
                    Middleware::resolve($route['middleware']);
                }
                return require basePath($route['controller']);
            }
        }
        $this->abort();
    }

    protected function abort($code = Response::HTTP_NOT_FOUND)
    {
        http_response_code($code);
        require basePath("views/{$code}.php");
        exit();
    }
}
