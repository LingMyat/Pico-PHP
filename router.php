<?php

$routes = require('web.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

function routeToController($uri,$routes) {
    if (array_key_exists($uri,$routes)) {
        require $routes[$uri];
    } else  {
        abort();
    }
}

function abort($status = Response::NOT_FOUND) {

    http_response_code($status);
    
    require "views/errors/{$status}.view.php";

    die();
}

routeToController($uri,$routes);