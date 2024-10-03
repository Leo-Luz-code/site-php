<?php

use Illuminate\Support\Str as str;

$str_limit = new \Twig\TwigFunction('str_limit', function ($value, $limit = 50, $end = '...') {

    return str::limit($value, $limit, $end);
});

$site_url = new \Twig\TwigFunction('site_url', function () {
    return 'http://' . $_SERVER['SERVER_NAME'] . ':8000';
});