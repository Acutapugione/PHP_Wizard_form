<?php 

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller{

    public function before()
    {
        $this->view->layout = 'wizzard';
    }

    public function loginAction()
    {
        if (!empty($_POST)){
            // debug($_POST);
            exit(json_encode(['status' => 'success', 'message' => 123]));
        }
        // $this->before();
        
        
        $this->view->render('Вход');
    }

    public function registerAction()
    {
        //$this->before();
        
        $this->view->path = 'account/signin';        
        $this->view->render('Регистрация');
    }

}

?>