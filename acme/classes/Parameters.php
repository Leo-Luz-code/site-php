<?php

namespace acme\classes;
use \acme\classes\Url as Url;
class Parameters
{
    public static function getParameter($indexNumber)
    {
        $explodeUrl = explode("/", URL::getUrl());
        return $explodeUrl[$indexNumber];
    }
}