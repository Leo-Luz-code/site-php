<?php

namespace app\controllers\site;

use app\controllers\BaseController;
use app\models\NewsQuery;
use app\models\SpecialtyQuery;

class HomeController extends BaseController
{
    public function index()
    {

        /**
         * listing all news
         */
        $news = NewsQuery::create()
            ->limit(4)
            ->find();

        /**
         * listing all specialties
         */

        $specialties = SpecialtyQuery::create()
            ->limit(4)
            ->find();

        // dump($specialties);

        $data = [

            'title' => 'OceanSoft | Home',
            'news' => $news,
            'specialties' => $specialties

        ];

        $template = $this->twig->load('site/home.html');
        $template->display($data);
    }
}
