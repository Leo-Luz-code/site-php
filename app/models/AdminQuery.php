<?php

namespace app\models;

use app\models\Base\AdminQuery as BaseAdminQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'tb_admin' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 */
class AdminQuery extends BaseAdminQuery
{
    public function filterByEmail($email)
    {
        return $this->filterByTbAdminEmail($email);
    }

    public function filterByPassword($password)
    {
        return $this->filterByTbAdminPassword($password);
    }
}
