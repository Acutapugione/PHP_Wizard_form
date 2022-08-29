<?php 

namespace application\core;

use application\core\View;

abstract class Controller
{
    public $route;
    public $view;
    public $acl;

    public function __construct($route) {
        $this->route = $route;
        
        if( !$this->checkAcl() ){
            debug( View::errorCode(403) );
        }
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);

    }

    public function loadModel($name)
    {
        $path = 'application\models\\'.ucfirst($name);
        if (class_exists($path)){
            return new $path;
        }
    }

    public function checkAcl()
    {
        $aclPath = 'application/acl/'.$this->route['controller'].'.php';
        //debug($aclPath);
        if ( file_exists($aclPath) ){
            $this->acl = require $aclPath;
            if ($this->isAcl('all')){
                return true;
            }
            elseif (isset($_SESSION['authorize']['id']) and $this->isAcl('authorized')){
                return true;
            }
            elseif (!isset($_SESSION['authorize']['id']) and $this->isAcl('guest')){
                return true;
            }
            elseif (isset($_SESSION['admin']) and $this->isAcl('admin')){
                return true;
            }
        } else {
            View::errorCode(403);
        }
        return false;
    }

    public function isAcl($key)
    {
        return in_array($this->route['action'], $this->acl[$key]);
    }
}

?>