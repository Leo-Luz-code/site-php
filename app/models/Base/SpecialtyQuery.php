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
use app\models\Specialty as ChildSpecialty;
use app\models\SpecialtyQuery as ChildSpecialtyQuery;
use app\models\Map\SpecialtyTableMap;

/**
 * Base class that represents a query for the `tb_specialty` table.
 *
 * @method     ChildSpecialtyQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildSpecialtyQuery orderByTbSpecialtyName($order = Criteria::ASC) Order by the tb_specialty_name column
 * @method     ChildSpecialtyQuery orderByTbSpecialtyDescription($order = Criteria::ASC) Order by the tb_specialty_description column
 * @method     ChildSpecialtyQuery orderByTbSpecialtyIcon($order = Criteria::ASC) Order by the tb_specialty_icon column
 *
 * @method     ChildSpecialtyQuery groupById() Group by the id column
 * @method     ChildSpecialtyQuery groupByTbSpecialtyName() Group by the tb_specialty_name column
 * @method     ChildSpecialtyQuery groupByTbSpecialtyDescription() Group by the tb_specialty_description column
 * @method     ChildSpecialtyQuery groupByTbSpecialtyIcon() Group by the tb_specialty_icon column
 *
 * @method     ChildSpecialtyQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSpecialtyQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSpecialtyQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSpecialtyQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildSpecialtyQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildSpecialtyQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildSpecialty|null findOne(?ConnectionInterface $con = null) Return the first ChildSpecialty matching the query
 * @method     ChildSpecialty findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildSpecialty matching the query, or a new ChildSpecialty object populated from the query conditions when no match is found
 *
 * @method     ChildSpecialty|null findOneById(int $id) Return the first ChildSpecialty filtered by the id column
 * @method     ChildSpecialty|null findOneByTbSpecialtyName(string $tb_specialty_name) Return the first ChildSpecialty filtered by the tb_specialty_name column
 * @method     ChildSpecialty|null findOneByTbSpecialtyDescription(string $tb_specialty_description) Return the first ChildSpecialty filtered by the tb_specialty_description column
 * @method     ChildSpecialty|null findOneByTbSpecialtyIcon(string $tb_specialty_icon) Return the first ChildSpecialty filtered by the tb_specialty_icon column
 *
 * @method     ChildSpecialty requirePk($key, ?ConnectionInterface $con = null) Return the ChildSpecialty by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpecialty requireOne(?ConnectionInterface $con = null) Return the first ChildSpecialty matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpecialty requireOneById(int $id) Return the first ChildSpecialty filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpecialty requireOneByTbSpecialtyName(string $tb_specialty_name) Return the first ChildSpecialty filtered by the tb_specialty_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpecialty requireOneByTbSpecialtyDescription(string $tb_specialty_description) Return the first ChildSpecialty filtered by the tb_specialty_description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSpecialty requireOneByTbSpecialtyIcon(string $tb_specialty_icon) Return the first ChildSpecialty filtered by the tb_specialty_icon column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSpecialty[]|Collection find(?ConnectionInterface $con = null) Return ChildSpecialty objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildSpecialty> find(?ConnectionInterface $con = null) Return ChildSpecialty objects based on current ModelCriteria
 *
 * @method     ChildSpecialty[]|Collection findById(int|array<int> $id) Return ChildSpecialty objects filtered by the id column
 * @psalm-method Collection&\Traversable<ChildSpecialty> findById(int|array<int> $id) Return ChildSpecialty objects filtered by the id column
 * @method     ChildSpecialty[]|Collection findByTbSpecialtyName(string|array<string> $tb_specialty_name) Return ChildSpecialty objects filtered by the tb_specialty_name column
 * @psalm-method Collection&\Traversable<ChildSpecialty> findByTbSpecialtyName(string|array<string> $tb_specialty_name) Return ChildSpecialty objects filtered by the tb_specialty_name column
 * @method     ChildSpecialty[]|Collection findByTbSpecialtyDescription(string|array<string> $tb_specialty_description) Return ChildSpecialty objects filtered by the tb_specialty_description column
 * @psalm-method Collection&\Traversable<ChildSpecialty> findByTbSpecialtyDescription(string|array<string> $tb_specialty_description) Return ChildSpecialty objects filtered by the tb_specialty_description column
 * @method     ChildSpecialty[]|Collection findByTbSpecialtyIcon(string|array<string> $tb_specialty_icon) Return ChildSpecialty objects filtered by the tb_specialty_icon column
 * @psalm-method Collection&\Traversable<ChildSpecialty> findByTbSpecialtyIcon(string|array<string> $tb_specialty_icon) Return ChildSpecialty objects filtered by the tb_specialty_icon column
 *
 * @method     ChildSpecialty[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildSpecialty> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class SpecialtyQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \app\models\Base\SpecialtyQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\app\\models\\Specialty', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildSpecialtyQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildSpecialtyQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildSpecialtyQuery) {
            return $criteria;
        }
        $query = new ChildSpecialtyQuery();
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
     * @return ChildSpecialty|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(SpecialtyTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = SpecialtyTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildSpecialty A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, tb_specialty_name, tb_specialty_description, tb_specialty_icon FROM tb_specialty WHERE id = :p0';
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
            /** @var ChildSpecialty $obj */
            $obj = new ChildSpecialty();
            $obj->hydrate($row);
            SpecialtyTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildSpecialty|array|mixed the result, formatted by the current formatter
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

        $this->addUsingAlias(SpecialtyTableMap::COL_ID, $key, Criteria::EQUAL);

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

        $this->addUsingAlias(SpecialtyTableMap::COL_ID, $keys, Criteria::IN);

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
                $this->addUsingAlias(SpecialtyTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(SpecialtyTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SpecialtyTableMap::COL_ID, $id, $comparison);

        return $this;
    }

    /**
     * Filter the query on the tb_specialty_name column
     *
     * Example usage:
     * <code>
     * $query->filterByTbSpecialtyName('fooValue');   // WHERE tb_specialty_name = 'fooValue'
     * $query->filterByTbSpecialtyName('%fooValue%', Criteria::LIKE); // WHERE tb_specialty_name LIKE '%fooValue%'
     * $query->filterByTbSpecialtyName(['foo', 'bar']); // WHERE tb_specialty_name IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $tbSpecialtyName The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTbSpecialtyName($tbSpecialtyName = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tbSpecialtyName)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SpecialtyTableMap::COL_TB_SPECIALTY_NAME, $tbSpecialtyName, $comparison);

        return $this;
    }

    /**
     * Filter the query on the tb_specialty_description column
     *
     * Example usage:
     * <code>
     * $query->filterByTbSpecialtyDescription('fooValue');   // WHERE tb_specialty_description = 'fooValue'
     * $query->filterByTbSpecialtyDescription('%fooValue%', Criteria::LIKE); // WHERE tb_specialty_description LIKE '%fooValue%'
     * $query->filterByTbSpecialtyDescription(['foo', 'bar']); // WHERE tb_specialty_description IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $tbSpecialtyDescription The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTbSpecialtyDescription($tbSpecialtyDescription = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tbSpecialtyDescription)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SpecialtyTableMap::COL_TB_SPECIALTY_DESCRIPTION, $tbSpecialtyDescription, $comparison);

        return $this;
    }

    /**
     * Filter the query on the tb_specialty_icon column
     *
     * Example usage:
     * <code>
     * $query->filterByTbSpecialtyIcon('fooValue');   // WHERE tb_specialty_icon = 'fooValue'
     * $query->filterByTbSpecialtyIcon('%fooValue%', Criteria::LIKE); // WHERE tb_specialty_icon LIKE '%fooValue%'
     * $query->filterByTbSpecialtyIcon(['foo', 'bar']); // WHERE tb_specialty_icon IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $tbSpecialtyIcon The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTbSpecialtyIcon($tbSpecialtyIcon = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tbSpecialtyIcon)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(SpecialtyTableMap::COL_TB_SPECIALTY_ICON, $tbSpecialtyIcon, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildSpecialty $specialty Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($specialty = null)
    {
        if ($specialty) {
            $this->addUsingAlias(SpecialtyTableMap::COL_ID, $specialty->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tb_specialty table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(SpecialtyTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SpecialtyTableMap::clearInstancePool();
            SpecialtyTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(SpecialtyTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(SpecialtyTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            SpecialtyTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            SpecialtyTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
