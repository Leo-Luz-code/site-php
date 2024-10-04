<?php

namespace app\controllers\site;
use app\controllers\BaseController;

class ContactController extends BaseController
{
    public function index()
    {
        $data = ['title' => 'Contact'];
        $template = $this->twig->load('contact.html');
        $template->display($data);
    }

    public function person()
    {
        $data = ['title' => 'Contact Person'];
        $template = $this->twig->load('contactPerson.html');
        $template->display($data);
    }
}