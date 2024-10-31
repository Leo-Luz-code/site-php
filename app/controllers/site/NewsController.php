<?php

namespace app\controllers\site;

use app\controllers\BaseController;
use app\models\Base\NewsQuery;

class NewsController extends BaseController
{
    public function listNews()
    {

        $news = NewsQuery::create()->find();

        if ($news->isEmpty()) {
            echo json_encode(['error' => 'No news found']);
            return;
        }

        $newsArray = [];
        foreach ($news as $new) {
            $newsArray[] = $new->toArray();
        }

        echo json_encode($newsArray);

    }
}