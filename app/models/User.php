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
     * �������� ������� � ��.
     * @var string
     */
    protected static $tableName = 'users';

    /**
     * �����������.
     *
     * @param int $id ������������� ������������
     */
    public function __construct($id = null)
    {
        $className = DATABASE_CLASS;
        $db = new $className;
        $res = $db->selectQuery('SELECT * FROM ' . self::$tableName . ' WHERE id=%s', $id);
    }

    static public function GetAllUsers()
    {
        $className = DATABASE_CLASS;
        $db = new $className;
        // SELECT users.*, cities.name as city_name FROM users LEFT JOIN cities ON cities.id = users.city_id;
        $usersTb = self::$tableName;
        $citiesTb = City::$tableName;
        $query = "SELECT $usersTb.*, $citiesTb.name as city_name FROM $usersTb "
            . "LEFT JOIN $citiesTb ON $citiesTb.id = $usersTb.city_id";
        $res = $db->selectQuery($query);
        return $res;
    }

    public function updateElement($id, $name, $value)
    {
        $name = str_replace('`', '', $name);
        $className = DATABASE_CLASS;
        $db = new $className;
        $res = $db->query('UPDATE ' . self::$tableName . " SET `$name`=%s WHERE id=%s", $value, $id);
        return $res;
    }
}
