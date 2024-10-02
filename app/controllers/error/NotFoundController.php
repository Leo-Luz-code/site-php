<?php

namespace app\controllers\error;

use app\controllers\BaseController;

class NotFoundController extends BaseController
{

    public function index()
    {
        $data = ['title' => 'Error404'];
        $template = $this->twig->load('error/404.html');
        $template->display($data);
    }
}
