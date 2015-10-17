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
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}
else
{
    error_reporting(0);
}

define('APP_DIR', dirname(__FILE__) . '/../app/');

require_once (APP_DIR . 'config.php');



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