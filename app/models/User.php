<?php

/**
 * Class UserModel
 *
 * Данные по пользователю.
 */
class UserModel
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
        $res = $db->query('SELECT * FROM user WHERE id=%s', $id);
        echo "POS_2";
        print_r($res);
    }
}
