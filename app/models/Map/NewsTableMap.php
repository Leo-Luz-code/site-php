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
use app\models\News;
use app\models\NewsQuery;


/**
 * This class defines the structure of the 'tb_news' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class NewsTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    public const CLASS_NAME = 'app.models.Map.NewsTableMap';

    /**
     * The default database name for this class
     */
    public const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    public const TABLE_NAME = 'tb_news';

    /**
     * The PHP name of this class (PascalCase)
     */
    public const TABLE_PHP_NAME = 'News';

    /**
     * The related Propel class for this table
     */
    public const OM_CLASS = '\\app\\models\\News';

    /**
     * A class that can be returned by this tableMap
     */
    public const CLASS_DEFAULT = 'app.models.News';

    /**
     * The total number of columns
     */
    public const NUM_COLUMNS = 7;

    /**
     * The number of lazy-loaded columns
     */
    public const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    public const NUM_HYDRATE_COLUMNS = 7;

    /**
     * the column name for the id field
     */
    public const COL_ID = 'tb_news.id';

    /**
     * the column name for the tb_news_title field
     */
    public const COL_TB_NEWS_TITLE = 'tb_news.tb_news_title';

    /**
     * the column name for the tb_news_text field
     */
    public const COL_TB_NEWS_TEXT = 'tb_news.tb_news_text';

    /**
     * the column name for the tb_news_date field
     */
    public const COL_TB_NEWS_DATE = 'tb_news.tb_news_date';

    /**
     * the column name for the tb_news_author field
     */
    public const COL_TB_NEWS_AUTHOR = 'tb_news.tb_news_author';

    /**
     * the column name for the tb_news_slug field
     */
    public const COL_TB_NEWS_SLUG = 'tb_news.tb_news_slug';

    /**
     * the column name for the tb_news_pic field
     */
    public const COL_TB_NEWS_PIC = 'tb_news.tb_news_pic';

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
        self::TYPE_PHPNAME       => ['Id', 'TbNewsTitle', 'TbNewsText', 'TbNewsDate', 'TbNewsAuthor', 'TbNewsSlug', 'TbNewsPic', ],
        self::TYPE_CAMELNAME     => ['id', 'tbNewsTitle', 'tbNewsText', 'tbNewsDate', 'tbNewsAuthor', 'tbNewsSlug', 'tbNewsPic', ],
        self::TYPE_COLNAME       => [NewsTableMap::COL_ID, NewsTableMap::COL_TB_NEWS_TITLE, NewsTableMap::COL_TB_NEWS_TEXT, NewsTableMap::COL_TB_NEWS_DATE, NewsTableMap::COL_TB_NEWS_AUTHOR, NewsTableMap::COL_TB_NEWS_SLUG, NewsTableMap::COL_TB_NEWS_PIC, ],
        self::TYPE_FIELDNAME     => ['id', 'tb_news_title', 'tb_news_text', 'tb_news_date', 'tb_news_author', 'tb_news_slug', 'tb_news_pic', ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, ]
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
        self::TYPE_PHPNAME       => ['Id' => 0, 'TbNewsTitle' => 1, 'TbNewsText' => 2, 'TbNewsDate' => 3, 'TbNewsAuthor' => 4, 'TbNewsSlug' => 5, 'TbNewsPic' => 6, ],
        self::TYPE_CAMELNAME     => ['id' => 0, 'tbNewsTitle' => 1, 'tbNewsText' => 2, 'tbNewsDate' => 3, 'tbNewsAuthor' => 4, 'tbNewsSlug' => 5, 'tbNewsPic' => 6, ],
        self::TYPE_COLNAME       => [NewsTableMap::COL_ID => 0, NewsTableMap::COL_TB_NEWS_TITLE => 1, NewsTableMap::COL_TB_NEWS_TEXT => 2, NewsTableMap::COL_TB_NEWS_DATE => 3, NewsTableMap::COL_TB_NEWS_AUTHOR => 4, NewsTableMap::COL_TB_NEWS_SLUG => 5, NewsTableMap::COL_TB_NEWS_PIC => 6, ],
        self::TYPE_FIELDNAME     => ['id' => 0, 'tb_news_title' => 1, 'tb_news_text' => 2, 'tb_news_date' => 3, 'tb_news_author' => 4, 'tb_news_slug' => 5, 'tb_news_pic' => 6, ],
        self::TYPE_NUM           => [0, 1, 2, 3, 4, 5, 6, ]
    ];

    /**
     * Holds a list of column names and their normalized version.
     *
     * @var array<string>
     */
    protected $normalizedColumnNameMap = [
        'Id' => 'ID',
        'News.Id' => 'ID',
        'id' => 'ID',
        'news.id' => 'ID',
        'NewsTableMap::COL_ID' => 'ID',
        'COL_ID' => 'ID',
        'tb_news.id' => 'ID',
        'TbNewsTitle' => 'TB_NEWS_TITLE',
        'News.TbNewsTitle' => 'TB_NEWS_TITLE',
        'tbNewsTitle' => 'TB_NEWS_TITLE',
        'news.tbNewsTitle' => 'TB_NEWS_TITLE',
        'NewsTableMap::COL_TB_NEWS_TITLE' => 'TB_NEWS_TITLE',
        'COL_TB_NEWS_TITLE' => 'TB_NEWS_TITLE',
        'tb_news_title' => 'TB_NEWS_TITLE',
        'tb_news.tb_news_title' => 'TB_NEWS_TITLE',
        'TbNewsText' => 'TB_NEWS_TEXT',
        'News.TbNewsText' => 'TB_NEWS_TEXT',
        'tbNewsText' => 'TB_NEWS_TEXT',
        'news.tbNewsText' => 'TB_NEWS_TEXT',
        'NewsTableMap::COL_TB_NEWS_TEXT' => 'TB_NEWS_TEXT',
        'COL_TB_NEWS_TEXT' => 'TB_NEWS_TEXT',
        'tb_news_text' => 'TB_NEWS_TEXT',
        'tb_news.tb_news_text' => 'TB_NEWS_TEXT',
        'TbNewsDate' => 'TB_NEWS_DATE',
        'News.TbNewsDate' => 'TB_NEWS_DATE',
        'tbNewsDate' => 'TB_NEWS_DATE',
        'news.tbNewsDate' => 'TB_NEWS_DATE',
        'NewsTableMap::COL_TB_NEWS_DATE' => 'TB_NEWS_DATE',
        'COL_TB_NEWS_DATE' => 'TB_NEWS_DATE',
        'tb_news_date' => 'TB_NEWS_DATE',
        'tb_news.tb_news_date' => 'TB_NEWS_DATE',
        'TbNewsAuthor' => 'TB_NEWS_AUTHOR',
        'News.TbNewsAuthor' => 'TB_NEWS_AUTHOR',
        'tbNewsAuthor' => 'TB_NEWS_AUTHOR',
        'news.tbNewsAuthor' => 'TB_NEWS_AUTHOR',
        'NewsTableMap::COL_TB_NEWS_AUTHOR' => 'TB_NEWS_AUTHOR',
        'COL_TB_NEWS_AUTHOR' => 'TB_NEWS_AUTHOR',
        'tb_news_author' => 'TB_NEWS_AUTHOR',
        'tb_news.tb_news_author' => 'TB_NEWS_AUTHOR',
        'TbNewsSlug' => 'TB_NEWS_SLUG',
        'News.TbNewsSlug' => 'TB_NEWS_SLUG',
        'tbNewsSlug' => 'TB_NEWS_SLUG',
        'news.tbNewsSlug' => 'TB_NEWS_SLUG',
        'NewsTableMap::COL_TB_NEWS_SLUG' => 'TB_NEWS_SLUG',
        'COL_TB_NEWS_SLUG' => 'TB_NEWS_SLUG',
        'tb_news_slug' => 'TB_NEWS_SLUG',
        'tb_news.tb_news_slug' => 'TB_NEWS_SLUG',
        'TbNewsPic' => 'TB_NEWS_PIC',
        'News.TbNewsPic' => 'TB_NEWS_PIC',
        'tbNewsPic' => 'TB_NEWS_PIC',
        'news.tbNewsPic' => 'TB_NEWS_PIC',
        'NewsTableMap::COL_TB_NEWS_PIC' => 'TB_NEWS_PIC',
        'COL_TB_NEWS_PIC' => 'TB_NEWS_PIC',
        'tb_news_pic' => 'TB_NEWS_PIC',
        'tb_news.tb_news_pic' => 'TB_NEWS_PIC',
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
        $this->setName('tb_news');
        $this->setPhpName('News');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\app\\models\\News');
        $this->setPackage('app.models');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('tb_news_title', 'TbNewsTitle', 'VARCHAR', false, 128, null);
        $this->addColumn('tb_news_text', 'TbNewsText', 'VARCHAR', false, 128, null);
        $this->addColumn('tb_news_date', 'TbNewsDate', 'TIMESTAMP', false, null, null);
        $this->addColumn('tb_news_author', 'TbNewsAuthor', 'VARCHAR', false, 128, null);
        $this->addColumn('tb_news_slug', 'TbNewsSlug', 'VARCHAR', false, 128, null);
        $this->addColumn('tb_news_pic', 'TbNewsPic', 'BLOB', false, null, null);
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
        return $withPrefix ? NewsTableMap::CLASS_DEFAULT : NewsTableMap::OM_CLASS;
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
     * @return array (News object, last column rank)
     */
    public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM): array
    {
        $key = NewsTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = NewsTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + NewsTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = NewsTableMap::OM_CLASS;
            /** @var News $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            NewsTableMap::addInstanceToPool($obj, $key);
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
            $key = NewsTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = NewsTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var News $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                NewsTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(NewsTableMap::COL_ID);
            $criteria->addSelectColumn(NewsTableMap::COL_TB_NEWS_TITLE);
            $criteria->addSelectColumn(NewsTableMap::COL_TB_NEWS_TEXT);
            $criteria->addSelectColumn(NewsTableMap::COL_TB_NEWS_DATE);
            $criteria->addSelectColumn(NewsTableMap::COL_TB_NEWS_AUTHOR);
            $criteria->addSelectColumn(NewsTableMap::COL_TB_NEWS_SLUG);
            $criteria->addSelectColumn(NewsTableMap::COL_TB_NEWS_PIC);
        } else {
            $criteria->addSelectColumn($alias . '.id');
            $criteria->addSelectColumn($alias . '.tb_news_title');
            $criteria->addSelectColumn($alias . '.tb_news_text');
            $criteria->addSelectColumn($alias . '.tb_news_date');
            $criteria->addSelectColumn($alias . '.tb_news_author');
            $criteria->addSelectColumn($alias . '.tb_news_slug');
            $criteria->addSelectColumn($alias . '.tb_news_pic');
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
            $criteria->removeSelectColumn(NewsTableMap::COL_ID);
            $criteria->removeSelectColumn(NewsTableMap::COL_TB_NEWS_TITLE);
            $criteria->removeSelectColumn(NewsTableMap::COL_TB_NEWS_TEXT);
            $criteria->removeSelectColumn(NewsTableMap::COL_TB_NEWS_DATE);
            $criteria->removeSelectColumn(NewsTableMap::COL_TB_NEWS_AUTHOR);
            $criteria->removeSelectColumn(NewsTableMap::COL_TB_NEWS_SLUG);
            $criteria->removeSelectColumn(NewsTableMap::COL_TB_NEWS_PIC);
        } else {
            $criteria->removeSelectColumn($alias . '.id');
            $criteria->removeSelectColumn($alias . '.tb_news_title');
            $criteria->removeSelectColumn($alias . '.tb_news_text');
            $criteria->removeSelectColumn($alias . '.tb_news_date');
            $criteria->removeSelectColumn($alias . '.tb_news_author');
            $criteria->removeSelectColumn($alias . '.tb_news_slug');
            $criteria->removeSelectColumn($alias . '.tb_news_pic');
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
        return Propel::getServiceContainer()->getDatabaseMap(NewsTableMap::DATABASE_NAME)->getTable(NewsTableMap::TABLE_NAME);
    }

    /**
     * Performs a DELETE on the database, given a News or Criteria object OR a primary key value.
     *
     * @param mixed $values Criteria or News object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(NewsTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \app\models\News) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(NewsTableMap::DATABASE_NAME);
            $criteria->add(NewsTableMap::COL_ID, (array) $values, Criteria::IN);
        }

        $query = NewsQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            NewsTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                NewsTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the tb_news table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(?ConnectionInterface $con = null): int
    {
        return NewsQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a News or Criteria object.
     *
     * @param mixed $criteria Criteria or News object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed The new primary key.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(NewsTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from News object
        }

        if ($criteria->containsKey(NewsTableMap::COL_ID) && $criteria->keyContainsValue(NewsTableMap::COL_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.NewsTableMap::COL_ID.')');
        }


        // Set the correct dbName
        $query = NewsQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

}
