<?php

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

function authorize($condition, $status = Response::FORBIDDEN) {
    if(!$condition) abort($status);
}