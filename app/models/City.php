<?php

require_once (APP_DIR . 'components/' . DATABASE_CLASS . '.php');

/**
* Class City
*
* �������� ������ �� �������.
*/
class City
{
    /**
     * �������� ������� � ��.
     * @var string
     */
    public static $tableName = 'cities';

    /**
    * �����������.
    *
    * @param int $id ������������� ������
    *
    public function __construct($id, $name)
    {

    }*/

    static public function GetAllCities()
    {
        $className = DATABASE_CLASS;
        $db = new $className;
        $res = $db->selectQuery("SELECT * FROM " . self::$tableName);
        return $res;
    }
}