<?php

namespace acme\classes;

class AddSlashUrl
{
    public function addSlash()
    {
        if ($_SERVER['REQUEST_URI'] != '/') {
            return $_SERVER['REQUEST_URI'] . '/';
        }

        return $_SERVER['REQUEST_URI'];
    }
}
