<?php

/**
 * Interface DatabaseOperations
 *
 * ��������� ��� ������ � ��.
 */
interface DatabaseOperations
{
    public function selectQuery($sql);
    public function query($sql);
    public function escape_string($string);
}