<?php

namespace acme\classes;

class Url
{

    public static function getUrl()
    {
        return $_SERVER['REQUEST_URI'];
    }
}
