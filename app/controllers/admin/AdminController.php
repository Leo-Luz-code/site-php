<?php

namespace app\controllers\site;

use app\controllers\BaseController;
use app\models\AdminQuery;
use acme\classes\Redirect;

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
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):
            $admin = new AdminQuery();
            $admin->setFields(['tb_admin_email', 'tb_admin_password']);

            /**
             * treating input fields from form
             */

            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');

            $dataFromLoggedInAdmin = $admin->login($email, $password);

            if ($dataFromLoggedInAdmin !== null) {
                session_regenerate_id();
                $_SESSION['loggedAdmin'] = true;
                $_SESSION['idAdmin'] = $dataFromLoggedInAdmin->getId();
                $_SESSION['adminData'] = serialize($dataFromLoggedInAdmin);

                Redirect::to('dashboard');

            } else {

                $data = [
                    'title' => 'AdminLogin',
                    'error' => 'Error at login'
                ];

                $template = $this->twig->load('admin/login.html');
                $template->display($data);
            }

        else:

            $this->index();

        endif;
    }
}
