<?php

namespace app\controllers\site;

use app\controllers\BaseController;
use app\models\NewsQuery;

class AdminController extends BaseController
{
    public function index()
    {
        $data = ['title' => 'Admin Login'];
        $template = $this->twig->load('admin/login.html');
        $template->display($data);
    }

    public function login()
    {
        echo 'samba';
    }
}
