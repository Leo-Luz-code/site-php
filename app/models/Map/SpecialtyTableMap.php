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
use app\models\Specialty;
use app\models\SpecialtyQuery;


/**
 * This class defines the structure of the 'tb_specialty' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class SpecialtyTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = 'app.models.Map.SpecialtyTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'tb_specialty';

    /**
     * The PHP name of this class (PascalCase)
     */
    public const TABLE_PHP_NAME = 'Specialty';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\app\\models\\Specialty';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'app.models.Specialty';

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
    public const COL_ID = 'tb_specialty.id';

    /**
     * the column name for the tb_specialty_name field
     */
    public const COL_TB_SPECIALTY_NAME = 'tb_specialty.tb_specialty_name';

    /**
     * the column name for the tb_specialty_description field
     */
    public const COL_TB_SPECIALTY_DESCRIPTION = 'tb_specialty.tb_specialty_description';

    /**
     * the column name for the tb_specialty_icon field
     */
    public const COL_TB_SPECIALTY_ICON = 'tb_specialty.tb_specialty_icon';

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
        self::TYPE_PHPNAME       => ['Id', 'TbSpecialtyName', 'TbSpecialtyDescription', 'TbSpecialtyIcon', ],
        self::TYPE_CAMELNAME     => ['id', 'tbSpecialtyName', 'tbSpecialtyDescription', 'tbSpecialtyIcon', ],
        self::TYPE_COLNAME       => [SpecialtyTableMap::COL_ID, SpecialtyTableMap::COL_TB_SPECIALTY_NAME, SpecialtyTableMap::COL_TB_SPECIALTY_DESCRIPTION, SpecialtyTableMap::COL_TB_SPECIALTY_ICON, ],
        self::TYPE_FIELDNAME     => ['id', 'tb_specialty_name', 'tb_specialty_description', 'tb_specialty_icon', ],
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
        self::TYPE_PHPNAME       => ['Id' => 0, 'TbSpecialtyName' => 1, 'TbSpecialtyDescription' => 2, 'TbSpecialtyIcon' => 3, ],
        self::TYPE_CAMELNAME     => ['id' => 0, 'tbSpecialtyName' => 1, 'tbSpecialtyDescription' => 2, 'tbSpecialtyIcon' => 3, ],
        self::TYPE_COLNAME       => [SpecialtyTableMap::COL_ID => 0, SpecialtyTableMap::COL_TB_SPECIALTY_NAME => 1, SpecialtyTableMap::COL_TB_SPECIALTY_DESCRIPTION => 2, SpecialtyTableMap::COL_TB_SPECIALTY_ICON => 3, ],
        self::TYPE_FIELDNAME     => ['id' => 0, 'tb_specialty_name' => 1, 'tb_specialty_description' => 2, 'tb_specialty_icon' => 3, ],
        self::TYPE_NUM           => [0, 1, 2, 3, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Id' => 'ID',
        'Specialty.Id' => 'ID',
        'id' => 'ID',
        'specialty.id' => 'ID',
        'SpecialtyTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'tb_specialty.id' => 'ID',
        'TbSpecialtyName' => 'TB_SPECIALTY_NAME',
        'Specialty.TbSpecialtyName' => 'TB_SPECIALTY_NAME',
        'tbSpecialtyName' => 'TB_SPECIALTY_NAME',
        'specialty.tbSpecialtyName' => 'TB_SPECIALTY_NAME',
        'SpecialtyTableMap::COL_TB_SPECIALTY_NAME' => 'TB_SPECIALTY_NAME',
        'COL_TB_SPECIALTY_NAME' => 'TB_SPECIALTY_NAME',
        'tb_specialty_name' => 'TB_SPECIALTY_NAME',
        'tb_specialty.tb_specialty_name' => 'TB_SPECIALTY_NAME',
        'TbSpecialtyDescription' => 'TB_SPECIALTY_DESCRIPTION',
        'Specialty.TbSpecialtyDescription' => 'TB_SPECIALTY_DESCRIPTION',
        'tbSpecialtyDescription' => 'TB_SPECIALTY_DESCRIPTION',
        'specialty.tbSpecialtyDescription' => 'TB_SPECIALTY_DESCRIPTION',
        'SpecialtyTableMap::COL_TB_SPECIALTY_DESCRIPTION' => 'TB_SPECIALTY_DESCRIPTION',
        'COL_TB_SPECIALTY_DESCRIPTION' => 'TB_SPECIALTY_DESCRIPTION',
        'tb_specialty_description' => 'TB_SPECIALTY_DESCRIPTION',
        'tb_specialty.tb_specialty_description' => 'TB_SPECIALTY_DESCRIPTION',
        'TbSpecialtyIcon' => 'TB_SPECIALTY_ICON',
        'Specialty.TbSpecialtyIcon' => 'TB_SPECIALTY_ICON',
        'tbSpecialtyIcon' => 'TB_SPECIALTY_ICON',
        'specialty.tbSpecialtyIcon' => 'TB_SPECIALTY_ICON',
        'SpecialtyTableMap::COL_TB_SPECIALTY_ICON' => 'TB_SPECIALTY_ICON',
        'COL_TB_SPECIALTY_ICON' => 'TB_SPECIALTY_ICON',
        'tb_specialty_icon' => 'TB_SPECIALTY_ICON',
        'tb_specialty.tb_specialty_icon' => 'TB_SPECIALTY_ICON',
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
        $this->setName('tb_specialty');
        $this->setPhpName('Specialty');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\app\\models\\Specialty');
        $this->setPackage('app.models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('tb_specialty_name', 'TbSpecialtyName', 'VARCHAR', false, 255, null);
        $this->addColumn('tb_specialty_description', 'TbSpecialtyDescription', 'VARCHAR', false, 255, null);
        $this->addColumn('tb_specialty_icon', 'TbSpecialtyIcon', 'VARCHAR', false, 255, null);
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
        return $withPrefix ? SpecialtyTableMap::CLASS_DEFAULT : SpecialtyTableMap::OM_CLASS;
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
     * @return array (Specialty object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = SpecialtyTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = SpecialtyTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + SpecialtyTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SpecialtyTableMap::OM_CLASS;
            /** @var Specialty $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            SpecialtyTableMap::addInstanceToPool($obj, $key);
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
            $key = SpecialtyTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = SpecialtyTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Specialty $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SpecialtyTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(SpecialtyTableMap::COL_ID);
            $criteria->addSelectColumn(SpecialtyTableMap::COL_TB_SPECIALTY_NAME);
            $criteria->addSelectColumn(SpecialtyTableMap::COL_TB_SPECIALTY_DESCRIPTION);
            $criteria->addSelectColumn(SpecialtyTableMap::COL_TB_SPECIALTY_ICON);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.tb_specialty_name');
            $criteria->addSelectColumn($alias . '.tb_specialty_description');
            $criteria->addSelectColumn($alias . '.tb_specialty_icon');
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
            $criteria->removeSelectColumn(SpecialtyTableMap::COL_ID);
            $criteria->removeSelectColumn(SpecialtyTableMap::COL_TB_SPECIALTY_NAME);
            $criteria->removeSelectColumn(SpecialtyTableMap::COL_TB_SPECIALTY_DESCRIPTION);
            $criteria->removeSelectColumn(SpecialtyTableMap::COL_TB_SPECIALTY_ICON);
        } else {
            $criteria->removeSelectColumn($alias . '.id');
            $criteria->removeSelectColumn($alias . '.tb_specialty_name');
            $criteria->removeSelectColumn($alias . '.tb_specialty_description');
            $criteria->removeSelectColumn($alias . '.tb_specialty_icon');
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
        return Propel::getServiceContainer()->getDatabaseMap(SpecialtyTableMap::DATABASE_NAME)->getTable(SpecialtyTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Specialty or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or Specialty object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(SpecialtyTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \app\models\Specialty) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SpecialtyTableMap::DATABASE_NAME);
            $criteria->add(SpecialtyTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = SpecialtyQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            SpecialtyTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                SpecialtyTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the tb_specialty table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return SpecialtyQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Specialty or Criteria object.
     *
     * @param mixed $criteria Criteria or Specialty object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpecialtyTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Specialty object
        }

        if ($criteria->containsKey(SpecialtyTableMap::COL_ID) && $criteria->keyContainsValue(SpecialtyTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.SpecialtyTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = SpecialtyQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
