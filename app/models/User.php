<?php

require_once (APP_DIR . 'components/' . DATABASE_CLASS . '.php');

/**
 * Class UserModel
 *
 * Данные по пользователю.
 */
class User
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var int
     */
    public $age;

    /**
     * @var City
     */
    public $city;

    /**
     * @var array|null
     */
    public $allUsers;

    /**
     * Конструктор.
     *
     * @param int $id идентификатор пользователя
     */
    public function __construct($id = null)
    {
        if($id)
        {
            $className = DATABASE_CLASS;
            $db = new $className;
            $res = $db->query('SELECT * FROM user WHERE id=%s', $id);
            //TODO: проверить проставляются ли скобки вокруг %s
        }
        else
        {
            // вернем всех пользователей
        }
    }

    static public function GetAllUsers()
    {
        $className = DATABASE_CLASS;
        $db = new $className;
        $res = $db->query('SELECT * FROM user');
        self::$allUsers = $res;
        return $res;
    }
}
