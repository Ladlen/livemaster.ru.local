<?php

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
     * �����������.
     *
     * @param int $id ������������� ������������
     */
    public function __construct($id)
    {
        $this->id = $id;

        $className = DATABASE_CLASS;
        $db = new $className;
        $res = $db->query('SELECT * FROM user WHERE id=%s', $id);
        //TODO: ��������� ������������� �� ������ ������ %s
        echo "POS_2";
        print_r($res);
    }
}