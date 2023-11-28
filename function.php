<?php

use Core\Response;

function dd($val) {
    echo "<pre>";
        var_dump($val);
    echo "</pre>";

    die();
}

function urIs($val) {
    return $_SERVER['REQUEST_URI'] === $val;
}

function config($key = '') {
    $config = require 'config.php';
    return $key? $config[$key] : $config;
}

function abort($status = Response::NOT_FOUND) {

    http_response_code($status);
    
    require base_path("views/errors/{$status}.view.php");

    die();
}

function authorize($condition, $status = Response::FORBIDDEN) {
    if(!$condition) abort($status);
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $data = [])
{
    extract($data);
    require base_path('views/'.$path);
}

function redirect($url) {
    header("Location: $url");
    die();
}