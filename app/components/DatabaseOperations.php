<?php

/**
 * Interface DatabaseOperations
 * Èםעונפויס הכÿ נאבמעû ס ÁÄ.
 */
interface DatabaseOperations
{
    public function query($sql);
    public function escape_string($string);
}