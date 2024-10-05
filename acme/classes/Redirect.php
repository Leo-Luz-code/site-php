<?php

namespace acme\classes;

class Redirect
{
    public static function to($location)
    {
        $redirect = !is_null($location) ? $location : 'home';

        return header('Location:http://' . $_SERVER['HTTP_HOST'] . '/' . $redirect);
    }
}