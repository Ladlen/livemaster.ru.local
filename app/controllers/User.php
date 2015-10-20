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

    public function actionUpdate()
    {
        $ret = ['success' => false];

        $model = new User();
        $win1251Value = mb_convert_encoding($_REQUEST['value'], 'cp1251', 'UTF-8');
        if ($model->updateElement($_REQUEST['id'], $_REQUEST['name'], $win1251Value))
        {
            $ret = ['success' => true, 'value' => $_REQUEST['value']];
        }

        echo json_encode($ret);
        exit;
    }
}