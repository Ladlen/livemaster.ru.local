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
        return $id;
    }
}
echo 'dfsdf';
$usr = new User(240);

exit;