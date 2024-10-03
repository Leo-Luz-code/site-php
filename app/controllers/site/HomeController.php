<?php

namespace app\controllers\site;

use app\controllers\BaseController;
use app\models\NewsQuery;

class HomeController extends BaseController
{
    public function index()
    {

        /**
         * listing all news
         */
        $news = NewsQuery::create()->findPK(1);

        dump($news);

        $data = ['title' => 'Home'];
        $template = $this->twig->load('home.html');
        $template->display($data);
    }
}
