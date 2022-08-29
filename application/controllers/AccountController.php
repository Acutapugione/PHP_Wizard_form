<?php 

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller{

    public function __construct($route) {
        parent::__construct($route);
        //$this->before();
    }
    public function before()
    {
        $this->view->layout = 'wizzard';
    }

    public function loginAction()
    {
        $this->view->render('Вход');
    }

    public function registerAction()
    {    

        $countries = require 'application/config/countries.php';
        $variables = [
    'id' => 'register_form',
    'title' => 'To participate in the conference, please fill out the form',
    'fields' => [
        [
            'id' => 'first_name',
            'page' => 0,
            'name' => 'first name',
            'required' => true,
            'type' => 'text',
            'class' => 'form-control',
        ],
        [
            'id' => 'last_name',
            'page' => 0,
            'name' => 'last name',
            'required' => true,
            'type' => 'text',
            'class' => 'form-control',
        ],
        [
            'id' => 'birthdate',
            'page' => 0,
            'name' => 'birthdate',
            'date-format' => 'mm.dd.yyyy',
            'required' => true,
            'type' => 'date',
            'class' => 'form-control',
        ],
        [
            'id' => 'report_subject',
            'page' => 0,
            'name' => 'report subject',
            'required' => true,
            'type' => 'text',
            'class' => 'form-control',
        ],
        [
            'id' => 'country',
            'page' => 0,
            'name' => 'country',
            'required' => true,
            'type' => 'select',
            'selected' => 'select country...',
            'options' => $countries,
            'class' => 'form-control',
        ],
        [
            'id' => 'phone',
            'page' => 0,
            'name' => 'phone',
            'required' => true,
            'type' => 'tel',
            'placeholder' => "+__(___)-___-__-__",
            'value' => '+3',
            'data-slots' => '_',
            'pattern' => '+[0-9]{2}([0-9]{3})-[0-9]{3}-[0-9]{2}-[0-9]{2}',
            'class' => 'form-control',
        ],
        [
            'id' => 'email',
            'page' => 0,
            'name' => 'email',
            'required' => true,
            'type' => 'email',
            'class' => 'form-control',
        ],
        [
            'id' => 'company',
            'page' => 1,
            'name' => 'company',
            'required' => false,
            'type' => 'text',
            'class' => 'form-control',
        ],
        [
            'id' => 'position',
            'page' => 1,
            'name' => 'position',
            'required' => false,
            'type' => 'text',
            'class' => 'form-control',
        ],
        [
            'id' => 'about',
            'page' => 1,
            'name' => 'about me',
            'required' => false,
            'type' => 'text',
            'class' => 'form-control',
        ],
    ],
];
        // debug($variables);
        $this->view->path = 'account/signin';        
        $this->view->render('Регистрация', $variables );
    }

}

?>