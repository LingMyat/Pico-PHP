<?php

namespace Core;

class Router {
    protected $routes = [];

    protected function add($uri, $controller, $method) 
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];
    }

    public function get($uri, $controller) 
    {
        $this->add($uri, $controller, 'GET');
    }

    public function post($uri, $controller) 
    {
        $this->add($uri, $controller, 'POST');
    }

    public function patch($uri, $controller) 
    {
        $this->add($uri, $controller, 'PATCH');
    }

    public function put($uri, $controller) 
    {
        $this->add($uri, $controller, 'PUT');
    }

    public function delete($uri, $controller) 
    {
        $this->add($uri, $controller, 'DELETE');
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require base_path($route['controller']);
            }
        }

        $this->abort();
    }

    protected function abort($status = Response::NOT_FOUND) {

        http_response_code($status);
        
        require base_path("views/errors/{$status}.view.php");

        die();
    }
}