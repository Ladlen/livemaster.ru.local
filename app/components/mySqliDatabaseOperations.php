<?php

require_once(dirname(__FILE__) . '/DatabaseOperations.php');

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
                throw new Exception('�� ����������� ���������� � ����� ������ : ' . mysqli_error(self::$mySqlLink));
            }
            $dbSelected = mysqli_select_db(self::$mySqlLink, MYSQL_DB);
            if ( !$dbSelected ) {
                throw new Exception('�� ���� ������� ���� ������ : ' . mysqli_error(self::$mySqlLink));
            }
        }
    }

    /**
     * ���������� ������������� ������ �� ����������� �������.
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
            throw new Exception('������ mysql : ' . mysqli_error(self::$mySqlLink));
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
