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
        $ret = array('success' => false);

        $model = new User();
        $model->updateElement($_REQUEST['id'], $_REQUEST['name'], $_REQUEST['value']);

        /*switch($_REQUEST['name'])
        {
            case 'name':
            {
                $className = DATABASE_CLASS;
                $db = new $className;
                $res = $db->query('UPDATE users SET name=%s WHERE id=%s', $_REQUEST['value'], $_REQUEST['id']);
                break;
            }
            case 'age':
            {
                break;
            }
            case 'city':
            {
                break;
            }
            default:
                break;
        }*/

        echo json_encode($ret);
        exit;
    }
}