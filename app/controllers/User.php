<?php

require_once (APP_DIR . 'controllers/Controller.php');
require_once (APP_DIR . 'models/User.php');

class UserController extends Controller
{
    public function actionIndex()
    {
        $model = User::GetAllUsers();
        $this->render(APP_DIR . 'views/User.php', ['model' => $model->rows]);
    }
}