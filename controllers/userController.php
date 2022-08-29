<?php 

include_once '../models/user.php';

class UserController
{
    public $model;
    public function __construct() {
        $this->model = new User();
    }

    public function __invoke()
    {
        if( !isset($_GET['user'])){
            // $users = $this->model->getAllUsers();
            // include '../views/';
        }
        else{
            // $user = $this->model->getUser($_GET['user']);
            // include '../views/';
        }
    }
}

?>