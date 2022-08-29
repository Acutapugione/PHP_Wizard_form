<?php 

namespace application\controllers;

use application\core\Controller;
// use application\lib\Db;

class MainController extends Controller{
    
    public function indexAction()
    {
        
        $result = $this->model->getMembers();
        $variables = [
            'members' => $result,
        ];
        $this->view->render('Главная страница', $variables);
        // echo 'Main page';
    }

}

?>