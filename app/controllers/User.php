<?php

require_once (APP_DIR . 'controllers/Controller.php');
require_once (APP_DIR . 'models/User.php');

class UserController extends Controller
{
    public function actionIndex()
    {
        $model = User::GetAllUsers();
        $this->render(APP_DIR . 'views/User.php', ['model' => $model]);
        #echo 'POS_1<br>';
        #$user = new User(1);
        #$user2 = new User(1);
        #$this->render(APP_DIR . 'views/User.php', ['userList' => $user]);
        #$tt =['userList' => ['id' => 10, 'name' => 'Дима', 'age' => 30, 'city' => 'sdfdf']];
        #print_r($tt);
        #$this->render(APP_DIR . 'views/User.php', ['userList' => ['id' => 10, 'name' => 'Дима', 'age' => 30, 'city' => 'sdfdf']]);
    }
}