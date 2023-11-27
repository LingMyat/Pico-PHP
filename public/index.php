<?php   

const BASE_PATH = __DIR__.'/../';

require BASE_PATH . 'function.php';

spl_autoload_register(function ($class) {

    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require base_path("{$class}.php");
});

require base_path('router.php');


// dd($db->query("SELECT * FROM notes")->get());


