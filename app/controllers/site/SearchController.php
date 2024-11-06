<?php

namespace app\controllers\site;

use acme\classes\Sanitize;
use app\controllers\BaseController;
use app\models\NewsQuery;

class SearchController extends BaseController
{
    public function search()
    {
        $searchFilter = Sanitize::string($_GET['search']);

        $searchResult = NewsQuery::searchNews($searchFilter);

        $data = [
            'title' => 'OceanSoft | Search',
            'searchResult' => $searchResult,
            'searchFilter' => $searchFilter
        ];

        $template = $this->twig->load('/site/search.html');
        $template->display($data);
    }
}