<?php
session_start();

require 'application/lib/Dev.php';

use application\core\Router;

spl_autoload_register(function ($class) {
    $path = str_replace('\\', '/', "$class.php");
    if (file_exists($path)) {
        require $path;
    }
});

$router = new Router;
$router->run();

