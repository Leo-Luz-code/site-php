<?php

namespace app\controllers\site;
use app\controllers\BaseController;

class AboutController extends BaseController
{
    public function index()
    {
        $data = ['title' => 'About the enterprise'];
        $template = $this->twig->load('site/about.html');
        $template->display($data);
    }
}