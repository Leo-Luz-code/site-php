<?php

namespace acme\classes;

class Sanitize
{

    public static function string($value)
    {
        return htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
    }

    public static function email($value)
    {
        return filter_var(trim($value), FILTER_SANITIZE_EMAIL);
    }

    public static function int($value)
    {
        return filter_var(trim($value), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    public static function specialChars($value)
    {
        return filter_var(trim($value), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
}