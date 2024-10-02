<?php

namespace app\controllers\site;

use app\controllers\BaseController;

class HomeController extends BaseController
{

    public function index()
    {
        $data = ['title' => 'Home'];
        $template = $this->twig->load('home.html');
        $template->display($data);
    }
}
