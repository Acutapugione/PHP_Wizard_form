<?php 

namespace application\core;

use application\core\View;

class Router
{
    protected $routes = [];
    protected $params = [];
    
    public function __construct() {
        $arr = require_once 'application/config/routes.php';
        foreach ($arr as $route => $params) {
            $this->add($route, $params);
        }
    }    

    public function add($route, $params): void
    {
        $route = "#^$route$#";
        $this->routes[$route] = $params; 
    }

    public function match(): bool
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach( $this->routes as $route => $params ){
            if ( preg_match($route, $url, $mathes)){
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function run(): void
    {
        if($this->match()){
            $path = "application\controllers\\".ucfirst($this->params['controller'])."Controller";

            if(class_exists($path)){
                $action = $this->params['action'].'Action';
                if (method_exists($path, $action)){
                    $controller = new $path($this->params);
                    $controller->$action();
                } else {
                    View::errorCode(404);
                }
            } else {
                View::errorCode(404);
            }
        } else {
            View::errorCode(404);
        }
    }

    
}
