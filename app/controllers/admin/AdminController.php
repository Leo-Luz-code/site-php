<?php

namespace app\controllers\site;

use app\controllers\BaseController;
use app\models\AdminQuery;
use app\models\Admin;
use acme\classes\Redirect;

class AdminController extends BaseController
{

    public function index()
    {
        unset($_SESSION["error"]);

        $data = ['title' => 'Admin Login'];
        $template = $this->twig->load('admin/login.html');
        $template->display($data);
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'):

            /**
             * treating input fields from form
             */

            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');

            $dataAuth = AdminQuery::create()->findOneByTbAdminEmail($email);

            if ($dataAuth === null) {
                $_SESSION['error'] = "Invalid Email or Password";
                Redirect::to("admin");
            } else {

                $encryptedPassword = $dataAuth->getTbAdminPassword();

                if (password_verify($password, $encryptedPassword)) {

                    $dataAuth->setFields(['tb_admin_email', 'tb_admin_password']);

                    $dataFromLoggedInAdmin = $dataAuth->login(AdminQuery::class, $email, $encryptedPassword);

                    if ($dataFromLoggedInAdmin !== null) {
                        session_regenerate_id();
                        $_SESSION['loggedAdmin'] = true;
                        $_SESSION['idAdmin'] = $dataFromLoggedInAdmin->getId();
                        $_SESSION['adminData'] = serialize($dataFromLoggedInAdmin);

                        Redirect::to('dashboard');

                    } else {

                        $_SESSION['error'] = "Invalid Email or Password";
                        Redirect::to("admin");

                    }
                } else {

                    $_SESSION['error'] = "Invalid Email or Password";
                    Redirect::to("admin");

                }

            }

        else:

            $this->index();

        endif;
    }
}
