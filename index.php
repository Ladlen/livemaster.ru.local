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

ini_set('error_reporting', E_ALL);

define('DATABASE', 'mySql');
define('MYSQL_HOST', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASS', 'temp123');
define('MYSQL_DB', 'user_list');

define('DATABASE_CLASS', DATABASE . 'DatabaseOperations');

define('DEBUG', true);


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

class mySqlDatabaseOperations implements DatabaseOperations
{
    protected static $mySqlLink;

    public function __construct()
    {
        $this->mysql_prepare();
    }

    protected function mysql_prepare()
    {
        if ( is_null(self::$mySqlLink) )
        {
            self::$mySqlLink = mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASS);
            if ( !self::$mySqlLink ) {
                throw new Exception('Не установлено соединение с базой данных : ' . mysql_error(self::$mySqlLink));
            }

            $db_selected = mysql_select_db(MYSQL_DB, self::$mySqlLink);
            if ( !$db_selected ) {
                throw new Exception('Can\'t select database : ' . mysql_error(self::$mySqlLink));
            }
        }
    }

    public function query($sql)
    {
        if ( !$res = mysql_query($sql, self::$mySqlLink) )
        {
            throw new Exception('Ошибка mysql : ' . mysql_error(self::$mySqlLink));
        }

        return $res;
    }

    public function escape_string($string)
    {
        $ret = mysql_real_escape_string($string, self::$mySqlLink);
        if ( $ret === false )
        {
            throw new Exception('Ошибка mysql : ' . mysql_error(self::$mySqlLink));
        }
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
            throw new Exception('MySql error : ' . mysql_error(self::$mySqlLink));
        }
        return $ret;
    }

    public function mysql_num_rows($res)
    {
        $ret = mysql_num_rows($res);
        if ( $ret === false )
        {
            throw new Exception('MySql error : ' . mysql_error(self::$mySqlLink));
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
        echo "sdfdsf+++";
        $this->id = $id;

        $db = new DATABASE_CLASS;
        #$res = $db->query('SELECT * from user');
        echo "POS_2";
        #print_r($res);
    }
}
echo 'dfsd222f';
$usr = new User(240);

exit;