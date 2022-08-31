<?php

namespace application\controllers;

use application\core\Controller;
use application\core\View;
use application\models\Account;

class AccountController extends Controller
{

    public function __construct($route)
    {
        parent::__construct($route);
        $this->before();
    }
    public function before()
    {
        $this->view->layout = 'wizzard';
    }

    public function signupAction()
    {
        if(!empty($_POST)){
            $vars = $_POST;
            if( key_exists('country', $_POST)){
                $vars['country'] = $this->model->getCountryId($_POST['country']);
            }
        }
        $this->model->validateForm();        
        $this->view->redirect('register');
    }

    
    public function registerAction()
    {
        if( !empty($_POST)){
            $memberData = $_POST;
            if( !empty($_FILES)){
                $path = '/application/uploads/'.time().$_FILES['photo']['name'];
                move_uploaded_file($_FILES['photo']['tmp_name'], $path);
                $memberData['photo'] = $path;
            }
            $member = $this->model->signUp($memberData);
            if($member){
                $_SESSION['authorize'] = ['id' => $member ];
            }
        }
        if ( !empty($_SESSION)){
            if (isset($_SESSION['authorize']['id'])){
                $this->view->redirect('../');        
                exit();               
            }
        }
        $map_api_key =  require 'application/config/map.php';
        $countries = require 'application/config/countries.php';
        $variables = [
            'map_api_key' => $map_api_key['api'],
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
                [
                    'id' => 'photo',
                    'page' => 1,
                    'name' => 'photo',
                    'required' => false,
                    'type' => 'file',
                    'class' => 'form-control',
                    'accept' => 'image/*',
                ],
            ],
        ];
        $this->view->render('Регистрация', $variables);
    }
}
