<?php

namespace app\controllers\site;

use app\controllers\BaseController;
use acme\classes\Parameters;
use app\models\NewsQuery;


class NewsController extends BaseController
{
    public function index()
    {
        $parameter = Parameters::getParameter(2);
        $news = NewsQuery::create()
            ->findByTbNewsSlug($parameter)
            ->getFirst();


        $data = [
            'title' => 'OceanSoft | News',
            'news' => $news
        ];

        $template = $this->twig->load('site/news.html');
        $template->display($data);
    }
}