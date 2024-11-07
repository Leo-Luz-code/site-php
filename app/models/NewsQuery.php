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
            ->filterByTbNewsText("%$news%", Criteria::LIKE)
            ->_or()
            ->filterByTbNewsTitle("%$news%", Criteria::LIKE)
            ->find();
    }

}
