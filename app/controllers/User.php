<?php

require_once (APP_DIR . 'controllers/Controller.php');

class User extends Controller
{
    public function actionIndex()
    {
        $testV = 'HERE WE+++++';
        include(APP_DIR . 'views/User.php');
    }
}