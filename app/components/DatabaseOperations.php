<?php

/**
 * Interface DatabaseOperations
 * ��������� ��� ������ � ��.
 */
interface DatabaseOperations
{
    public function query($sql);
    public function escape_string($string);
}