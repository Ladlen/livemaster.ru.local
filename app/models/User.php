<?php

//TODO: что-то здесь не так, но в данном случае одновременно быстрого и оптимального решени€ не вижу
require_once (APP_DIR . 'components/' . DATABASE_CLASS . '.php');

/**
 * Class UserModel
 *
 * ƒанные по пользователю.
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
     *  онструктор.
     *
     * @param int $id идентификатор пользовател€
     */
    public function __construct($id = null)
    {
        $className = DATABASE_CLASS;
        $db = new $className;
        $res = $db->query('SELECT * FROM user WHERE id=%s', $id);
        //TODO: проверить проставл€ютс€ ли скобки вокруг %s
    }

    static public function GetAllUsers()
    {
        $className = DATABASE_CLASS;
        $db = new $className;
        $res = $db->query('SELECT * FROM users');
        return $res;
    }
}
