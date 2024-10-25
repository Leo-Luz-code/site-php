<?php

namespace acme\classes;

class Url
{

    public static function getUrl()
    {
        $query = parse_url($_SERVER['REQUEST_URI']);

        return $query['path'];
    }

    public static function getQueryString()
    {
        $query = parse_url($_SERVER['REQUEST_URI']);

        $queryString = $query['query'] ?? null;

        return $queryString;
    }

    public static function hasLastPage()
    {
        return isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'];
    }

    public static function getAllUri()
    {
        return $_SERVER['REQUEST_URI'];
    }

    public static function getLastPage()
    {
        if (self::hasLastPage()) {
            $explode = explode('/', $_SERVER['HTTP_REFERER']);
            unset($explode[0]);
            unset($explode[1]);
            unset($explode[2]);
            $implode = implode('/', $explode);

            return $implode;

        }

    }
}
