<?php 

return [
    // MainController
    '' => [
        'controller' => 'main',
        'action' => 'index',
    ],    
    'about' => [
        'controller' => 'main',
        'action' => 'about',
    ],
    'contact' => [
        'controller' => 'main',
        'action' => 'contact',
    ],
    'post' => [
        'controller' => 'main',
        'action' => 'post',
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
    // 'account/logout' => [
    //     'controller' => 'account',
    //     'action' => 'logout',
    // ],
    
];