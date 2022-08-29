<?php 

namespace application\core;

require_once 'application/config/bootstrap.php';

class View
{
    
    public $path;
    public $route;
    public $layout = 'default';



    public function __construct($route) {
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
        // debug($this->path);
    }


    public function render($title, $variables = [])
    {
        
        extract( $variables );
        
        $viewFile = 'application/views/'.$this->path.'.php';
        if (file_exists( $viewFile ) ){
            ob_start();
            require $viewFile;
            $content = ob_get_clean(); 
            require 'application/views/layouts/'.$this->layout.'.php';
        } else {
            echo 'View not found '.$this->path;
        }
    }

    public static function errorCode($code)
    {
        http_response_code($code);
        $errorViewFile = 'application/views/errors/'.$code.'.php';
        if (file_exists($errorViewFile)){
            require $errorViewFile;
        } else {
            debug( $errorViewFile );
        }
        exit;
    }

    public function redirect($url)
    {
        header('location: '.$url);
        exit;
    }

    public function message($status, $message){
        exit(json_encode(['status' => $status, 'message' => $message]));
    }

    public function location($url){
        exit(json_encode(['url' => $url]));
    }
}

?>