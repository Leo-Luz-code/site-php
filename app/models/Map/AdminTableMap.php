<?php

namespace app\models\Map;

use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;
use app\models\Admin;
use app\models\AdminQuery;


/**
 * This class defines the structure of the 'tb_admin' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class AdminTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = 'app.models.Map.AdminTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'tb_admin';

    /**
     * The PHP name of this class (PascalCase)
     */
    public const TABLE_PHP_NAME = 'Admin';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\app\\models\\Admin';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'app.models.Admin';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 4;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 4;

    /**
     * the column name for the id field
     */
    public const COL_ID = 'tb_admin.id';

    /**
     * the column name for the tb_admin_name field
     */
    public const COL_TB_ADMIN_NAME = 'tb_admin.tb_admin_name';

    /**
     * the column name for the tb_admin_email field
     */
    public const COL_TB_ADMIN_EMAIL = 'tb_admin.tb_admin_email';

    /**
     * the column name for the tb_admin_password field
     */
    public const COL_TB_ADMIN_PASSWORD = 'tb_admin.tb_admin_password';

    /**
     * The default string format for model objects of the related table
     */
    public const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     *
     * @var array<string, mixed>
     */
    protected static $fieldNames = [
        self::TYPE_PHPNAME       => ['Id', 'TbAdminName', 'TbAdminEmail', 'TbAdminPassword', ],
        self::TYPE_CAMELNAME     => ['id', 'tbAdminName', 'tbAdminEmail', 'tbAdminPassword', ],
        self::TYPE_COLNAME       => [AdminTableMap::COL_ID, AdminTableMap::COL_TB_ADMIN_NAME, AdminTableMap::COL_TB_ADMIN_EMAIL, AdminTableMap::COL_TB_ADMIN_PASSWORD, ],
        self::TYPE_FIELDNAME     => ['id', 'tb_admin_name', 'tb_admin_email', 'tb_admin_password', ],
        self::TYPE_NUM           => [0, 1, 2, 3, ]
    ];

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     *
     * @var array<string, mixed>
     */
    protected static $fieldKeys = [
        self::TYPE_PHPNAME       => ['Id' => 0, 'TbAdminName' => 1, 'TbAdminEmail' => 2, 'TbAdminPassword' => 3, ],
        self::TYPE_CAMELNAME     => ['id' => 0, 'tbAdminName' => 1, 'tbAdminEmail' => 2, 'tbAdminPassword' => 3, ],
        self::TYPE_COLNAME       => [AdminTableMap::COL_ID => 0, AdminTableMap::COL_TB_ADMIN_NAME => 1, AdminTableMap::COL_TB_ADMIN_EMAIL => 2, AdminTableMap::COL_TB_ADMIN_PASSWORD => 3, ],
        self::TYPE_FIELDNAME     => ['id' => 0, 'tb_admin_name' => 1, 'tb_admin_email' => 2, 'tb_admin_password' => 3, ],
        self::TYPE_NUM           => [0, 1, 2, 3, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Id' => 'ID',
        'Admin.Id' => 'ID',
        'id' => 'ID',
        'admin.id' => 'ID',
        'AdminTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'tb_admin.id' => 'ID',
        'TbAdminName' => 'TB_ADMIN_NAME',
        'Admin.TbAdminName' => 'TB_ADMIN_NAME',
        'tbAdminName' => 'TB_ADMIN_NAME',
        'admin.tbAdminName' => 'TB_ADMIN_NAME',
        'AdminTableMap::COL_TB_ADMIN_NAME' => 'TB_ADMIN_NAME',
        'COL_TB_ADMIN_NAME' => 'TB_ADMIN_NAME',
        'tb_admin_name' => 'TB_ADMIN_NAME',
        'tb_admin.tb_admin_name' => 'TB_ADMIN_NAME',
        'TbAdminEmail' => 'TB_ADMIN_EMAIL',
        'Admin.TbAdminEmail' => 'TB_ADMIN_EMAIL',
        'tbAdminEmail' => 'TB_ADMIN_EMAIL',
        'admin.tbAdminEmail' => 'TB_ADMIN_EMAIL',
        'AdminTableMap::COL_TB_ADMIN_EMAIL' => 'TB_ADMIN_EMAIL',
        'COL_TB_ADMIN_EMAIL' => 'TB_ADMIN_EMAIL',
        'tb_admin_email' => 'TB_ADMIN_EMAIL',
        'tb_admin.tb_admin_email' => 'TB_ADMIN_EMAIL',
        'TbAdminPassword' => 'TB_ADMIN_PASSWORD',
        'Admin.TbAdminPassword' => 'TB_ADMIN_PASSWORD',
        'tbAdminPassword' => 'TB_ADMIN_PASSWORD',
        'admin.tbAdminPassword' => 'TB_ADMIN_PASSWORD',
        'AdminTableMap::COL_TB_ADMIN_PASSWORD' => 'TB_ADMIN_PASSWORD',
        'COL_TB_ADMIN_PASSWORD' => 'TB_ADMIN_PASSWORD',
        'tb_admin_password' => 'TB_ADMIN_PASSWORD',
        'tb_admin.tb_admin_password' => 'TB_ADMIN_PASSWORD',
    ];

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function initialize(): void
    {
        // attributes
        $this->setName('tb_admin');
        $this->setPhpName('Admin');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\app\\models\\Admin');
        $this->setPackage('app.models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('tb_admin_name', 'TbAdminName', 'VARCHAR', false, 128, null);
        $this->addColumn('tb_admin_email', 'TbAdminEmail', 'VARCHAR', false, 128, null);
        $this->addColumn('tb_admin_password', 'TbAdminPassword', 'VARCHAR', false, 128, null);
    }

    /**
     * Build the RelationMap objects for this table relationships
     *
     * @return void
     */
    public function buildRelations(): void
    {
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array $row Resultset row.
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string|null The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): ?string
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array $row Resultset row.
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param bool $withPrefix Whether to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass(bool $withPrefix = true): string
    {
        return $withPrefix ? AdminTableMap::CLASS_DEFAULT : AdminTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array $row Row returned by DataFetcher->fetch().
     * @param int $offset The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array (Admin object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = AdminTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = AdminTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + AdminTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = AdminTableMap::OM_CLASS;
            /** @var Admin $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            AdminTableMap::addInstanceToPool($obj, $key);
        }

        return [$obj, $col];
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array<object>
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher): array
    {
        $results = [];

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = AdminTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = AdminTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Admin $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                AdminTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria Object containing the columns to add.
     * @param string|null $alias Optional table alias
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return void
     */
    public static function addSelectColumns(Criteria $criteria, ?string $alias = null): void
    {
        if (null === $alias) {
            $criteria->addSelectColumn(AdminTableMap::COL_ID);
            $criteria->addSelectColumn(AdminTableMap::COL_TB_ADMIN_NAME);
            $criteria->addSelectColumn(AdminTableMap::COL_TB_ADMIN_EMAIL);
            $criteria->addSelectColumn(AdminTableMap::COL_TB_ADMIN_PASSWORD);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.tb_admin_name');
            $criteria->addSelectColumn($alias . '.tb_admin_email');
            $criteria->addSelectColumn($alias . '.tb_admin_password');
        }
    }

    /**
     * Remove all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be removed as they are only loaded on demand.
     *
     * @param Criteria $criteria Object containing the columns to remove.
     * @param string|null $alias Optional table alias
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return void
     */
    public static function removeSelectColumns(Criteria $criteria, ?string $alias = null): void
    {
        if (null === $alias) {
            $criteria->removeSelectColumn(AdminTableMap::COL_ID);
            $criteria->removeSelectColumn(AdminTableMap::COL_TB_ADMIN_NAME);
            $criteria->removeSelectColumn(AdminTableMap::COL_TB_ADMIN_EMAIL);
            $criteria->removeSelectColumn(AdminTableMap::COL_TB_ADMIN_PASSWORD);
        } else {
            $criteria->removeSelectColumn($alias . '.id');
            $criteria->removeSelectColumn($alias . '.tb_admin_name');
            $criteria->removeSelectColumn($alias . '.tb_admin_email');
            $criteria->removeSelectColumn($alias . '.tb_admin_password');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap(): TableMap
    {
        return Propel::getServiceContainer()->getDatabaseMap(AdminTableMap::DATABASE_NAME)->getTable(AdminTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Admin or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or Admin object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ?ConnectionInterface $con = null): int
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AdminTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \app\models\Admin) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(AdminTableMap::DATABASE_NAME);
            $criteria->add(AdminTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = AdminQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            AdminTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                AdminTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the tb_admin table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return AdminQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Admin or Criteria object.
     *
     * @param mixed $criteria Criteria or Admin object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AdminTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Admin object
        }

        if ($criteria->containsKey(AdminTableMap::COL_ID) && $criteria->keyContainsValue(AdminTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.AdminTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = AdminQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
