<?php
/*
CREATE DATABASE user_list CHARACTER SET cp1251;

CREATE TABLE users
(
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(30) NOT NULL,
    `age` TINYINT unsigned,
    `city_id` int(11) unsigned,
    PRIMARY KEY (`id`)
) CHARACTER SET cp1251;

CREATE TABLE users
(
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(30) NOT NULL,
    -- `age` DATETIME NOT NULL,
    `age` TINYINT unsigned,
    `city_id` int(11) unsigned,
    PRIMARY KEY (`id`)
) CHARACTER SET cp1251;
CREATE TABLE cities
(
    `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(30) NOT NULL,
    PRIMARY KEY (`id`)
) CHARACTER SET cp1251;

ALTER TABLE `users` ADD CONSTRAINT `user_city_id` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

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
require_once (APP_DIR . 'controllers/User.php');












class Application
{

}

$user = new UserController();

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