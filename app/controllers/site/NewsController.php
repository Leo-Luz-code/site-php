<?php

namespace app\controllers\site;

use app\controllers\BaseController;
use acme\classes\Parameters;
use app\models\NewsQuery;
use acme\classes\Redirect;

class NewsController extends BaseController
{
    public function index()
    {
        $parameter = Parameters::getParameter(2);
        $news = NewsQuery::create()
            ->findByTbNewsSlug($parameter)
            ->getFirst();

        if (!$news) {
            $data = [
                'title' => 'OceanSoft | News',
                'error' => 'We couldn\'t find the specific news you\'re looking for.'
            ];
        } else {
            $data = [
                'title' => 'OceanSoft | News',
                'news' => $news
            ];
        }

        $template = $this->twig->load('site/news.html');
        $template->display($data);
    }
}