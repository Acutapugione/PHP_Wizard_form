<?php 

namespace application\controllers;

use application\core\Controller;

class AdminController extends Controller{
    
    public function __construct($route) {
        parent::__construct($route);
        $this->view->layout = 'wizzard';
    }
    public function loginAction()
    {
        $this->view->render('Вход');
    }

    public function logoutAction()
    {
        $this->view->render('О нас');
    }

    public function registerAction()
    {
        $this->view->render('Регистрация');
    }
    
    public function addAction()
    {
        $this->view->render('Добавить запись');
    }

    public function editAction()
    {
        $this->view->render('Редактировать запись');
    }

    public function deleteAction()
    {
        exit('Удалить');
    }


}

?>