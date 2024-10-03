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
use app\models\Project;
use app\models\ProjectQuery;


/**
 * This class defines the structure of the 'tb_project' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class ProjectTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = 'app.models.Map.ProjectTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'tb_project';

    /**
     * The PHP name of this class (PascalCase)
     */
    public const TABLE_PHP_NAME = 'Project';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\app\\models\\Project';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'app.models.Project';

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
    public const COL_ID = 'tb_project.id';

    /**
     * the column name for the tb_project_name field
     */
    public const COL_TB_PROJECT_NAME = 'tb_project.tb_project_name';

    /**
     * the column name for the tb_project_description field
     */
    public const COL_TB_PROJECT_DESCRIPTION = 'tb_project.tb_project_description';

    /**
     * the column name for the tb_project_pic field
     */
    public const COL_TB_PROJECT_PIC = 'tb_project.tb_project_pic';

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
        self::TYPE_PHPNAME       => ['Id', 'TbProjectName', 'TbProjectDescription', 'TbProjectPic', ],
        self::TYPE_CAMELNAME     => ['id', 'tbProjectName', 'tbProjectDescription', 'tbProjectPic', ],
        self::TYPE_COLNAME       => [ProjectTableMap::COL_ID, ProjectTableMap::COL_TB_PROJECT_NAME, ProjectTableMap::COL_TB_PROJECT_DESCRIPTION, ProjectTableMap::COL_TB_PROJECT_PIC, ],
        self::TYPE_FIELDNAME     => ['id', 'tb_project_name', 'tb_project_description', 'tb_project_pic', ],
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
        self::TYPE_PHPNAME       => ['Id' => 0, 'TbProjectName' => 1, 'TbProjectDescription' => 2, 'TbProjectPic' => 3, ],
        self::TYPE_CAMELNAME     => ['id' => 0, 'tbProjectName' => 1, 'tbProjectDescription' => 2, 'tbProjectPic' => 3, ],
        self::TYPE_COLNAME       => [ProjectTableMap::COL_ID => 0, ProjectTableMap::COL_TB_PROJECT_NAME => 1, ProjectTableMap::COL_TB_PROJECT_DESCRIPTION => 2, ProjectTableMap::COL_TB_PROJECT_PIC => 3, ],
        self::TYPE_FIELDNAME     => ['id' => 0, 'tb_project_name' => 1, 'tb_project_description' => 2, 'tb_project_pic' => 3, ],
        self::TYPE_NUM           => [0, 1, 2, 3, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Id' => 'ID',
        'Project.Id' => 'ID',
        'id' => 'ID',
        'project.id' => 'ID',
        'ProjectTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'tb_project.id' => 'ID',
        'TbProjectName' => 'TB_PROJECT_NAME',
        'Project.TbProjectName' => 'TB_PROJECT_NAME',
        'tbProjectName' => 'TB_PROJECT_NAME',
        'project.tbProjectName' => 'TB_PROJECT_NAME',
        'ProjectTableMap::COL_TB_PROJECT_NAME' => 'TB_PROJECT_NAME',
        'COL_TB_PROJECT_NAME' => 'TB_PROJECT_NAME',
        'tb_project_name' => 'TB_PROJECT_NAME',
        'tb_project.tb_project_name' => 'TB_PROJECT_NAME',
        'TbProjectDescription' => 'TB_PROJECT_DESCRIPTION',
        'Project.TbProjectDescription' => 'TB_PROJECT_DESCRIPTION',
        'tbProjectDescription' => 'TB_PROJECT_DESCRIPTION',
        'project.tbProjectDescription' => 'TB_PROJECT_DESCRIPTION',
        'ProjectTableMap::COL_TB_PROJECT_DESCRIPTION' => 'TB_PROJECT_DESCRIPTION',
        'COL_TB_PROJECT_DESCRIPTION' => 'TB_PROJECT_DESCRIPTION',
        'tb_project_description' => 'TB_PROJECT_DESCRIPTION',
        'tb_project.tb_project_description' => 'TB_PROJECT_DESCRIPTION',
        'TbProjectPic' => 'TB_PROJECT_PIC',
        'Project.TbProjectPic' => 'TB_PROJECT_PIC',
        'tbProjectPic' => 'TB_PROJECT_PIC',
        'project.tbProjectPic' => 'TB_PROJECT_PIC',
        'ProjectTableMap::COL_TB_PROJECT_PIC' => 'TB_PROJECT_PIC',
        'COL_TB_PROJECT_PIC' => 'TB_PROJECT_PIC',
        'tb_project_pic' => 'TB_PROJECT_PIC',
        'tb_project.tb_project_pic' => 'TB_PROJECT_PIC',
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
        $this->setName('tb_project');
        $this->setPhpName('Project');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\app\\models\\Project');
        $this->setPackage('app.models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('tb_project_name', 'TbProjectName', 'VARCHAR', false, 128, null);
        $this->addColumn('tb_project_description', 'TbProjectDescription', 'VARCHAR', false, 255, null);
        $this->addColumn('tb_project_pic', 'TbProjectPic', 'BLOB', false, null, null);
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
        return $withPrefix ? ProjectTableMap::CLASS_DEFAULT : ProjectTableMap::OM_CLASS;
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
     * @return array (Project object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = ProjectTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = ProjectTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + ProjectTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = ProjectTableMap::OM_CLASS;
            /** @var Project $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            ProjectTableMap::addInstanceToPool($obj, $key);
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
            $key = ProjectTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = ProjectTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Project $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                ProjectTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(ProjectTableMap::COL_ID);
            $criteria->addSelectColumn(ProjectTableMap::COL_TB_PROJECT_NAME);
            $criteria->addSelectColumn(ProjectTableMap::COL_TB_PROJECT_DESCRIPTION);
            $criteria->addSelectColumn(ProjectTableMap::COL_TB_PROJECT_PIC);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.tb_project_name');
            $criteria->addSelectColumn($alias . '.tb_project_description');
            $criteria->addSelectColumn($alias . '.tb_project_pic');
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
            $criteria->removeSelectColumn(ProjectTableMap::COL_ID);
            $criteria->removeSelectColumn(ProjectTableMap::COL_TB_PROJECT_NAME);
            $criteria->removeSelectColumn(ProjectTableMap::COL_TB_PROJECT_DESCRIPTION);
            $criteria->removeSelectColumn(ProjectTableMap::COL_TB_PROJECT_PIC);
        } else {
            $criteria->removeSelectColumn($alias . '.id');
            $criteria->removeSelectColumn($alias . '.tb_project_name');
            $criteria->removeSelectColumn($alias . '.tb_project_description');
            $criteria->removeSelectColumn($alias . '.tb_project_pic');
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
        return Propel::getServiceContainer()->getDatabaseMap(ProjectTableMap::DATABASE_NAME)->getTable(ProjectTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a Project or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or Project object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(ProjectTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \app\models\Project) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(ProjectTableMap::DATABASE_NAME);
            $criteria->add(ProjectTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = ProjectQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            ProjectTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                ProjectTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the tb_project table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return ProjectQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Project or Criteria object.
     *
     * @param mixed $criteria Criteria or Project object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ProjectTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Project object
        }

        if ($criteria->containsKey(ProjectTableMap::COL_ID) && $criteria->keyContainsValue(ProjectTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.ProjectTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = ProjectQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
