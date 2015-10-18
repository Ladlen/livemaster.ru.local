<?php

require_once (APP_DIR . 'components/' . DATABASE_CLASS . '.php');

/**
 * Class UserModel
 *
 * ������ �� ������������.
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
     * �����������.
     *
     * @param int $id ������������� ������������
     */
    public function __construct($id = null)
    {
        if($id)
        {
            $className = DATABASE_CLASS;
            $db = new $className;
            $res = $db->query('SELECT * FROM user WHERE id=%s', $id);
            //TODO: ��������� ������������� �� ������ ������ %s
        }
        else
        {
            // ������ ���� �������������
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
