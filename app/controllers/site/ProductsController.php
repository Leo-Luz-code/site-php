<?php

namespace app\controllers\site;

use app\controllers\BaseController;
use acme\classes\Redirect;
use acme\classes\Parameters as Parameter;


class ProductsController extends BaseController
{
    public function index()
    {
        //Parameter::getParameter(2);

        $data = ['title' => 'Products page'];
        $template = $this->twig->load('site/products.html');
        $template->display($data);
    }
}
