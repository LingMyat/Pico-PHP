<?php   

const BASE_PATH = __DIR__.'/../';

require BASE_PATH . 'function.php';

spl_autoload_register(function ($class) {

    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path("{$class}.php");
});

require base_path('bootstrap.php');

// \Core\App::bind('Core\Validator', fn() => new \Core\Validator());

$router = new \Core\Router();

$routes = require base_path('web.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);


