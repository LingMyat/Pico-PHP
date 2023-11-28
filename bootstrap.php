<?php

use Core\App;
use Core\Database;
use Core\Container;

$container = new Container();

$container->bind('Core\Database', fn() => new Database(config('database')));

App::setContainer($container);