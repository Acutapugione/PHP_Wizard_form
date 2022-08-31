<?php 

return [
    // MainController
    '' => [
        'controller' => 'main',
        'action' => 'index',
    ],    
    'index' => [
        'controller' => 'main',
        'action' => 'index',
    ],

    // AccountController
    'account' => [
        'controller' => 'account',
        'action' => 'login',
    ],

    'account/signup' => [
        'controller' => 'account',
        'action' => 'signup',
    ],
    
    'account/register' => [
        'controller' => 'account',
        'action' => 'register',
    ],
    
];