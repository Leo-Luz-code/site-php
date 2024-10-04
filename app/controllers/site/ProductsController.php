<?php

namespace app\controllers\site;

use app\controllers\BaseController;

class ProductsController extends BaseController
{
    public function index()
    {
        $data = ['title' => 'Products page'];
        $template = $this->twig->load('products.html');
        $template->display($data);
    }
}
