<?php

require_once (APP_DIR . 'controllers/Controller.php');
require_once (APP_DIR . 'models/User.php');
require_once (APP_DIR . 'models/City.php');

class UserController extends Controller
{
    public function actionIndex()
    {
        $model = User::GetAllUsers();
        $cities = City::GetAllCities();
        $this->render(APP_DIR . 'views/User.php', ['model' => $model->rows, 'cities' => $cities->rows]);
    }

    public function actionUpdate()
    {
        $ret = ['success' => false];

        $model = new User();
        $win1251Value = mb_convert_encoding($_REQUEST['value'], 'cp1251', 'UTF-8');
        if ($model->updateUser($_REQUEST['id'], $_REQUEST['name'], $win1251Value))
        {
            $ret = ['success' => true, 'value' => $_REQUEST['value']];
        }

        echo json_encode($ret);
        exit;
    }

    public function actionCreateNewUser()
    {
        $ret = ['success' => false];

        $model = new User();
        $win1251Name = mb_convert_encoding($_REQUEST['name'], 'cp1251', 'UTF-8');
        if ($model->createUser($win1251Name, $_REQUEST['age'], $_REQUEST['city']))
        {
            $ret['success'] = true;
        }

        echo json_encode($ret);
        exit;
    }
}