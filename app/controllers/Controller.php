<?php

class Controller
{
    public function __construct()
    {
        $actionName = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'index';
        $functionName = 'action' . ucfirst($actionName);
        if(method_exists($this, $functionName))
        {
            $this->$functionName();
        }
    }
}