<?php

namespace app\models\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use app\models\News as ChildNews;
use app\models\NewsQuery as ChildNewsQuery;
use app\models\Map\NewsTableMap;

/**
 * Base class that represents a query for the `tb_news` table.
 *
 * @method     ChildNewsQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildNewsQuery orderByTbNewsTitle($order = Criteria::ASC) Order by the tb_news_title column
 * @method     ChildNewsQuery orderByTbNewsText($order = Criteria::ASC) Order by the tb_news_text column
 * @method     ChildNewsQuery orderByTbNewsDate($order = Criteria::ASC) Order by the tb_news_date column
 * @method     ChildNewsQuery orderByTbNewsAuthor($order = Criteria::ASC) Order by the tb_news_author column
 * @method     ChildNewsQuery orderByTbNewsSlug($order = Criteria::ASC) Order by the tb_news_slug column
 * @method     ChildNewsQuery orderByTbNewsPic($order = Criteria::ASC) Order by the tb_news_pic column
 *
 * @method     ChildNewsQuery groupById() Group by the id column
 * @method     ChildNewsQuery groupByTbNewsTitle() Group by the tb_news_title column
 * @method     ChildNewsQuery groupByTbNewsText() Group by the tb_news_text column
 * @method     ChildNewsQuery groupByTbNewsDate() Group by the tb_news_date column
 * @method     ChildNewsQuery groupByTbNewsAuthor() Group by the tb_news_author column
 * @method     ChildNewsQuery groupByTbNewsSlug() Group by the tb_news_slug column
 * @method     ChildNewsQuery groupByTbNewsPic() Group by the tb_news_pic column
 *
 * @method     ChildNewsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildNewsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildNewsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildNewsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildNewsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildNewsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildNews|null findOne(?ConnectionInterface $con = null) Return the first ChildNews matching the query
 * @method     ChildNews findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildNews matching the query, or a new ChildNews object populated from the query conditions when no match is found
 *
 * @method     ChildNews|null findOneById(int $id) Return the first ChildNews filtered by the id column
 * @method     ChildNews|null findOneByTbNewsTitle(string $tb_news_title) Return the first ChildNews filtered by the tb_news_title column
 * @method     ChildNews|null findOneByTbNewsText(string $tb_news_text) Return the first ChildNews filtered by the tb_news_text column
 * @method     ChildNews|null findOneByTbNewsDate(string $tb_news_date) Return the first ChildNews filtered by the tb_news_date column
 * @method     ChildNews|null findOneByTbNewsAuthor(string $tb_news_author) Return the first ChildNews filtered by the tb_news_author column
 * @method     ChildNews|null findOneByTbNewsSlug(string $tb_news_slug) Return the first ChildNews filtered by the tb_news_slug column
 * @method     ChildNews|null findOneByTbNewsPic(resource $tb_news_pic) Return the first ChildNews filtered by the tb_news_pic column
 *
 * @method     ChildNews requirePk($key, ?ConnectionInterface $con = null) Return the ChildNews by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNews requireOne(?ConnectionInterface $con = null) Return the first ChildNews matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildNews requireOneById(int $id) Return the first ChildNews filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNews requireOneByTbNewsTitle(string $tb_news_title) Return the first ChildNews filtered by the tb_news_title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNews requireOneByTbNewsText(string $tb_news_text) Return the first ChildNews filtered by the tb_news_text column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNews requireOneByTbNewsDate(string $tb_news_date) Return the first ChildNews filtered by the tb_news_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNews requireOneByTbNewsAuthor(string $tb_news_author) Return the first ChildNews filtered by the tb_news_author column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNews requireOneByTbNewsSlug(string $tb_news_slug) Return the first ChildNews filtered by the tb_news_slug column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildNews requireOneByTbNewsPic(resource $tb_news_pic) Return the first ChildNews filtered by the tb_news_pic column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildNews[]|Collection find(?ConnectionInterface $con = null) Return ChildNews objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildNews> find(?ConnectionInterface $con = null) Return ChildNews objects based on current ModelCriteria
 *
 * @method     ChildNews[]|Collection findById(int|array<int> $id) Return ChildNews objects filtered by the id column
 * @psalm-method Collection&\Traversable<ChildNews> findById(int|array<int> $id) Return ChildNews objects filtered by the id column
 * @method     ChildNews[]|Collection findByTbNewsTitle(string|array<string> $tb_news_title) Return ChildNews objects filtered by the tb_news_title column
 * @psalm-method Collection&\Traversable<ChildNews> findByTbNewsTitle(string|array<string> $tb_news_title) Return ChildNews objects filtered by the tb_news_title column
 * @method     ChildNews[]|Collection findByTbNewsText(string|array<string> $tb_news_text) Return ChildNews objects filtered by the tb_news_text column
 * @psalm-method Collection&\Traversable<ChildNews> findByTbNewsText(string|array<string> $tb_news_text) Return ChildNews objects filtered by the tb_news_text column
 * @method     ChildNews[]|Collection findByTbNewsDate(string|array<string> $tb_news_date) Return ChildNews objects filtered by the tb_news_date column
 * @psalm-method Collection&\Traversable<ChildNews> findByTbNewsDate(string|array<string> $tb_news_date) Return ChildNews objects filtered by the tb_news_date column
 * @method     ChildNews[]|Collection findByTbNewsAuthor(string|array<string> $tb_news_author) Return ChildNews objects filtered by the tb_news_author column
 * @psalm-method Collection&\Traversable<ChildNews> findByTbNewsAuthor(string|array<string> $tb_news_author) Return ChildNews objects filtered by the tb_news_author column
 * @method     ChildNews[]|Collection findByTbNewsSlug(string|array<string> $tb_news_slug) Return ChildNews objects filtered by the tb_news_slug column
 * @psalm-method Collection&\Traversable<ChildNews> findByTbNewsSlug(string|array<string> $tb_news_slug) Return ChildNews objects filtered by the tb_news_slug column
 * @method     ChildNews[]|Collection findByTbNewsPic(resource|array<resource> $tb_news_pic) Return ChildNews objects filtered by the tb_news_pic column
 * @psalm-method Collection&\Traversable<ChildNews> findByTbNewsPic(resource|array<resource> $tb_news_pic) Return ChildNews objects filtered by the tb_news_pic column
 *
 * @method     ChildNews[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildNews> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class NewsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \app\models\Base\NewsQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\app\\models\\News', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildNewsQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildNewsQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildNewsQuery) {
            return $criteria;
        }
        $query = new ChildNewsQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildNews|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(NewsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = NewsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildNews A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, tb_news_title, tb_news_text, tb_news_date, tb_news_author, tb_news_slug, tb_news_pic FROM tb_news WHERE id = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildNews $obj */
            $obj = new ChildNews();
            $obj->hydrate($row);
            NewsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con A connection object
     *
     * @return ChildNews|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param array $keys Primary keys to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return Collection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ?ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param mixed $key Primary key to use for the query
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        $this->addUsingAlias(NewsTableMap::COL_ID, $key, Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param array|int $keys The list of primary key to use for the query
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        $this->addUsingAlias(NewsTableMap::COL_ID, $keys, Criteria::IN);

        return $this;
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterById($id = null, ?string $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(NewsTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(NewsTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(NewsTableMap::COL_ID, $id, $comparison);

        return $this;
    }

    /**
     * Filter the query on the tb_news_title column
     *
     * Example usage:
     * <code>
     * $query->filterByTbNewsTitle('fooValue');   // WHERE tb_news_title = 'fooValue'
     * $query->filterByTbNewsTitle('%fooValue%', Criteria::LIKE); // WHERE tb_news_title LIKE '%fooValue%'
     * $query->filterByTbNewsTitle(['foo', 'bar']); // WHERE tb_news_title IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $tbNewsTitle The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTbNewsTitle($tbNewsTitle = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tbNewsTitle)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(NewsTableMap::COL_TB_NEWS_TITLE, $tbNewsTitle, $comparison);

        return $this;
    }

    /**
     * Filter the query on the tb_news_text column
     *
     * Example usage:
     * <code>
     * $query->filterByTbNewsText('fooValue');   // WHERE tb_news_text = 'fooValue'
     * $query->filterByTbNewsText('%fooValue%', Criteria::LIKE); // WHERE tb_news_text LIKE '%fooValue%'
     * $query->filterByTbNewsText(['foo', 'bar']); // WHERE tb_news_text IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $tbNewsText The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTbNewsText($tbNewsText = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tbNewsText)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(NewsTableMap::COL_TB_NEWS_TEXT, $tbNewsText, $comparison);

        return $this;
    }

    /**
     * Filter the query on the tb_news_date column
     *
     * Example usage:
     * <code>
     * $query->filterByTbNewsDate('2011-03-14'); // WHERE tb_news_date = '2011-03-14'
     * $query->filterByTbNewsDate('now'); // WHERE tb_news_date = '2011-03-14'
     * $query->filterByTbNewsDate(array('max' => 'yesterday')); // WHERE tb_news_date > '2011-03-13'
     * </code>
     *
     * @param mixed $tbNewsDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTbNewsDate($tbNewsDate = null, ?string $comparison = null)
    {
        if (is_array($tbNewsDate)) {
            $useMinMax = false;
            if (isset($tbNewsDate['min'])) {
                $this->addUsingAlias(NewsTableMap::COL_TB_NEWS_DATE, $tbNewsDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tbNewsDate['max'])) {
                $this->addUsingAlias(NewsTableMap::COL_TB_NEWS_DATE, $tbNewsDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(NewsTableMap::COL_TB_NEWS_DATE, $tbNewsDate, $comparison);

        return $this;
    }

    /**
     * Filter the query on the tb_news_author column
     *
     * Example usage:
     * <code>
     * $query->filterByTbNewsAuthor('fooValue');   // WHERE tb_news_author = 'fooValue'
     * $query->filterByTbNewsAuthor('%fooValue%', Criteria::LIKE); // WHERE tb_news_author LIKE '%fooValue%'
     * $query->filterByTbNewsAuthor(['foo', 'bar']); // WHERE tb_news_author IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $tbNewsAuthor The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTbNewsAuthor($tbNewsAuthor = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tbNewsAuthor)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(NewsTableMap::COL_TB_NEWS_AUTHOR, $tbNewsAuthor, $comparison);

        return $this;
    }

    /**
     * Filter the query on the tb_news_slug column
     *
     * Example usage:
     * <code>
     * $query->filterByTbNewsSlug('fooValue');   // WHERE tb_news_slug = 'fooValue'
     * $query->filterByTbNewsSlug('%fooValue%', Criteria::LIKE); // WHERE tb_news_slug LIKE '%fooValue%'
     * $query->filterByTbNewsSlug(['foo', 'bar']); // WHERE tb_news_slug IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $tbNewsSlug The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTbNewsSlug($tbNewsSlug = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tbNewsSlug)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(NewsTableMap::COL_TB_NEWS_SLUG, $tbNewsSlug, $comparison);

        return $this;
    }

    /**
     * Filter the query on the tb_news_pic column
     *
     * @param mixed $tbNewsPic The value to use as filter
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTbNewsPic($tbNewsPic = null, ?string $comparison = null)
    {

        $this->addUsingAlias(NewsTableMap::COL_TB_NEWS_PIC, $tbNewsPic, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildNews $news Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($news = null)
    {
        if ($news) {
            $this->addUsingAlias(NewsTableMap::COL_ID, $news->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tb_news table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(NewsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            NewsTableMap::clearInstancePool();
            NewsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(NewsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(NewsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            NewsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            NewsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
