<?php

/*
CREATE DATABASE user_list CHARACTER SET cp1251;
CREATE TABLE user
(
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `age` DATETIME NOT NULL,
    `city_id` int(11) unsigned,
    PRIMARY KEY (`id`)
) CHARACTER SET cp1251;
CREATE TABLE cities
(
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) CHARACTER SET cp1251;
*/

if (DEBUG)
{
    ini_set('error_reporting', E_ALL);
}
else
{

}

/**
 * Class City
 *
 * Содержит данные по городам.
 */
class City
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * Конструктор.
     *
     * @param int $id идентификатор города
     */
    public function __construct($id, $name)
    {

    }
}

interface DatabaseOperations
{
    public function query($sql);
    public function escape_string($string);
}

class mySqliDatabaseOperations implements DatabaseOperations
{
    protected static $mySqlLink;

    public function __construct()
    {
        $this->mysqli_prepare();
    }

    protected function mysqli_prepare()
    {
        if ( is_null(self::$mySqlLink) )
        {
            self::$mySqlLink = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASS);
            if (mysqli_connect_errno())
            {
                throw new Exception('Не установлено соединение с базой данных : ' . mysqli_error(self::$mySqlLink));
            }
            $dbSelected = mysqli_select_db(self::$mySqlLink, MYSQL_DB);
            if ( !$dbSelected ) {
                throw new Exception('Не могу выбрать базу данных : ' . mysqli_error(self::$mySqlLink));
            }
        }
    }

    /**
     * Возвращает ассоциативный массив по результатам запроса.
     *
     * @param string $sql
     * @return array
     * @throws Exception
     */
    public function query($sql)
    {
        $ret = array();

        if ( !$result = mysqli_query(self::$mySqlLink, $sql) )
        {
            throw new Exception('Ошибка mysql : ' . mysqli_error(self::$mySqlLink));
        }

        if ( $rows = mysqli_fetch_assoc($result) )
        {
            $ret = $rows;
        }
        mysqli_free_result($result);

        return $ret;
    }

    public function escape_string($string)
    {
        $ret = mysqli_real_escape_string(self::$mySqlLink, $string);
        return $ret;
    }

    /*public function mysql_insert_id()
    {
        return mysql_insert_id(self::$mySqlLink);
    }

    public function mysql_affected_rows()
    {
        $ret = mysql_affected_rows(self::$mySqlLink);
        if ( $ret == -1 )
        {
            throw new Exception('MySql error : ' . mysqli_error(self::$mySqlLink));
        }
        return $ret;
    }

    public function mysql_num_rows($res)
    {
        $ret = mysql_num_rows($res);
        if ( $ret === false )
        {
            throw new Exception('MySql error : ' . mysqli_error(self::$mySqlLink));
        }
        return $ret;
    }

    */
}


class User
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $age;

    /**
     * @var City
     */
    protected $city;

    /**
     * Конструктор.
     *
     * @param int $id идентификатор пользователя
     */
    public function __construct($id)
    {
        $this->id = $id;

        $className = DATABASE_CLASS;
        $db = new $className;
        $res = $db->query('SELECT * from user');
        echo "POS_2";
        print_r($res);
    }
}

class Application
{

}

echo 'POS_END';
$user = new User(240);

try
{
    new Application;
}
catch (Exception $e)
{
    if (DEBUG)
    {
        
    }
    else
    {

    }
}

exit;