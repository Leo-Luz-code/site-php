<?php

namespace app\controllers\site;

use app\controllers\BaseController;

class PageController extends BaseController
{

    public function about()
    {

        $data = [
            'title' => 'OceanSoft | About',
        ];

        $template = $this->twig->load('/site/about.html');
        $template->display($data);
    }

    public function seo()
    {

        $data = [
            'title' => 'OceanSoft | SEO',
        ];

        $template = $this->twig->load('/site/seo.html');
        $template->display($data);
    }

    public function webdesign()
    {

        $data = [
            'title' => 'OceanSoft | Web Design',
        ];

        $template = $this->twig->load('/site/webdesign.html');
        $template->display($data);
    }

    public function development()
    {
        $data = [
            'title' => 'OceanSoft | Development',
        ];

        $template = $this->twig->load('/site/development.html');
        $template->display($data);
    }

    public function services()
    {
        $data = [
            'title' => 'OceanSoft | Services',
        ];

        $template = $this->twig->load('/site/services.html');
        $template->display($data);
    }

    public function contact()
    {
        $data = [
            'title' => 'OceanSoft | Contact',
        ];

        $template = $this->twig->load('/site/contact.html');
        $template->display($data);
    }

}