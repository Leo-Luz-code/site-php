<?php

namespace app\models;

use app\models\Base\NewsQuery as BaseNewsQuery;
use Propel\Runtime\ActiveQuery\Criteria;


/**
 * Skeleton subclass for performing query and update operations on the 'tb_news' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 */
class NewsQuery extends BaseNewsQuery
{

    public static function searchNews($news)
    {
        return NewsQuery::create()
            ->condition('cond1', 'tb_news.tb_news_text LIKE ?', "%$news%")
            ->condition('cond2', 'tb_news.tb_news_title LIKE ?', "%$news%")
            ->where(['cond1', 'cond2'], Criteria::LOGICAL_OR)
            ->find();
    }

}
