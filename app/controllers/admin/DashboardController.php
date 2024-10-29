<?php

namespace app\controllers\admin;
use app\controllers\BaseController;

class DashboardController extends BaseController
{
    use \acme\traits\LoginTrait;

    public function index()
    {
        self::isLoggedIn('loggedAdmin', 'admin');

        $data = ['title' => 'Admin Dashboard'];
        $template = $this->twig->load('admin/dashboard/dashboard.html');
        $template->display($data);
    }
}