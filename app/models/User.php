<?php

//TODO: ���-�� ����� �� ���, �� � ������ ������ ������������ �������� � ������������ ������� �� ����
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
     * �����������.
     *
     * @param int $id ������������� ������������
     */
    public function __construct($id = null)
    {
        $className = DATABASE_CLASS;
        $db = new $className;
        $res = $db->query('SELECT * FROM user WHERE id=%s', $id);
        //TODO: ��������� ������������� �� ������ ������ %s
    }

    static public function GetAllUsers()
    {
        $className = DATABASE_CLASS;
        $db = new $className;
        $res = $db->query('SELECT * FROM users');
        return $res;
    }
}
