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
use app\models\Admin as ChildAdmin;
use app\models\AdminQuery as ChildAdminQuery;
use app\models\Map\AdminTableMap;

/**
 * Base class that represents a query for the `tb_admin` table.
 *
 * @method     ChildAdminQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAdminQuery orderByTbAdminName($order = Criteria::ASC) Order by the tb_admin_name column
 * @method     ChildAdminQuery orderByTbAdminEmail($order = Criteria::ASC) Order by the tb_admin_email column
 * @method     ChildAdminQuery orderByTbAdminPassword($order = Criteria::ASC) Order by the tb_admin_password column
 *
 * @method     ChildAdminQuery groupById() Group by the id column
 * @method     ChildAdminQuery groupByTbAdminName() Group by the tb_admin_name column
 * @method     ChildAdminQuery groupByTbAdminEmail() Group by the tb_admin_email column
 * @method     ChildAdminQuery groupByTbAdminPassword() Group by the tb_admin_password column
 *
 * @method     ChildAdminQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAdminQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAdminQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAdminQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildAdminQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildAdminQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildAdmin|null findOne(?ConnectionInterface $con = null) Return the first ChildAdmin matching the query
 * @method     ChildAdmin findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildAdmin matching the query, or a new ChildAdmin object populated from the query conditions when no match is found
 *
 * @method     ChildAdmin|null findOneById(int $id) Return the first ChildAdmin filtered by the id column
 * @method     ChildAdmin|null findOneByTbAdminName(string $tb_admin_name) Return the first ChildAdmin filtered by the tb_admin_name column
 * @method     ChildAdmin|null findOneByTbAdminEmail(string $tb_admin_email) Return the first ChildAdmin filtered by the tb_admin_email column
 * @method     ChildAdmin|null findOneByTbAdminPassword(string $tb_admin_password) Return the first ChildAdmin filtered by the tb_admin_password column
 *
 * @method     ChildAdmin requirePk($key, ?ConnectionInterface $con = null) Return the ChildAdmin by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdmin requireOne(?ConnectionInterface $con = null) Return the first ChildAdmin matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAdmin requireOneById(int $id) Return the first ChildAdmin filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdmin requireOneByTbAdminName(string $tb_admin_name) Return the first ChildAdmin filtered by the tb_admin_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdmin requireOneByTbAdminEmail(string $tb_admin_email) Return the first ChildAdmin filtered by the tb_admin_email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildAdmin requireOneByTbAdminPassword(string $tb_admin_password) Return the first ChildAdmin filtered by the tb_admin_password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildAdmin[]|Collection find(?ConnectionInterface $con = null) Return ChildAdmin objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildAdmin> find(?ConnectionInterface $con = null) Return ChildAdmin objects based on current ModelCriteria
 *
 * @method     ChildAdmin[]|Collection findById(int|array<int> $id) Return ChildAdmin objects filtered by the id column
 * @psalm-method Collection&\Traversable<ChildAdmin> findById(int|array<int> $id) Return ChildAdmin objects filtered by the id column
 * @method     ChildAdmin[]|Collection findByTbAdminName(string|array<string> $tb_admin_name) Return ChildAdmin objects filtered by the tb_admin_name column
 * @psalm-method Collection&\Traversable<ChildAdmin> findByTbAdminName(string|array<string> $tb_admin_name) Return ChildAdmin objects filtered by the tb_admin_name column
 * @method     ChildAdmin[]|Collection findByTbAdminEmail(string|array<string> $tb_admin_email) Return ChildAdmin objects filtered by the tb_admin_email column
 * @psalm-method Collection&\Traversable<ChildAdmin> findByTbAdminEmail(string|array<string> $tb_admin_email) Return ChildAdmin objects filtered by the tb_admin_email column
 * @method     ChildAdmin[]|Collection findByTbAdminPassword(string|array<string> $tb_admin_password) Return ChildAdmin objects filtered by the tb_admin_password column
 * @psalm-method Collection&\Traversable<ChildAdmin> findByTbAdminPassword(string|array<string> $tb_admin_password) Return ChildAdmin objects filtered by the tb_admin_password column
 *
 * @method     ChildAdmin[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildAdmin> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class AdminQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \app\models\Base\AdminQuery object.
     *
     * @param string $dbName The database name
     * @param string $modelName The phpName of a model, e.g. 'Book'
     * @param string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\app\\models\\Admin', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAdminQuery object.
     *
     * @param string $modelAlias The alias of a model in the query
     * @param Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAdminQuery
     */
    public static function create(?string $modelAlias = null, ?Criteria $criteria = null): Criteria
    {
        if ($criteria instanceof ChildAdminQuery) {
            return $criteria;
        }
        $query = new ChildAdminQuery();
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
     * @return ChildAdmin|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ?ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AdminTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = AdminTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildAdmin A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, tb_admin_name, tb_admin_email, tb_admin_password FROM tb_admin WHERE id = :p0';
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
            /** @var ChildAdmin $obj */
            $obj = new ChildAdmin();
            $obj->hydrate($row);
            AdminTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildAdmin|array|mixed the result, formatted by the current formatter
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

        $this->addUsingAlias(AdminTableMap::COL_ID, $key, Criteria::EQUAL);

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

        $this->addUsingAlias(AdminTableMap::COL_ID, $keys, Criteria::IN);

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
                $this->addUsingAlias(AdminTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AdminTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdminTableMap::COL_ID, $id, $comparison);

        return $this;
    }

    /**
     * Filter the query on the tb_admin_name column
     *
     * Example usage:
     * <code>
     * $query->filterByTbAdminName('fooValue');   // WHERE tb_admin_name = 'fooValue'
     * $query->filterByTbAdminName('%fooValue%', Criteria::LIKE); // WHERE tb_admin_name LIKE '%fooValue%'
     * $query->filterByTbAdminName(['foo', 'bar']); // WHERE tb_admin_name IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $tbAdminName The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTbAdminName($tbAdminName = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tbAdminName)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdminTableMap::COL_TB_ADMIN_NAME, $tbAdminName, $comparison);

        return $this;
    }

    /**
     * Filter the query on the tb_admin_email column
     *
     * Example usage:
     * <code>
     * $query->filterByTbAdminEmail('fooValue');   // WHERE tb_admin_email = 'fooValue'
     * $query->filterByTbAdminEmail('%fooValue%', Criteria::LIKE); // WHERE tb_admin_email LIKE '%fooValue%'
     * $query->filterByTbAdminEmail(['foo', 'bar']); // WHERE tb_admin_email IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $tbAdminEmail The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTbAdminEmail($tbAdminEmail = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tbAdminEmail)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdminTableMap::COL_TB_ADMIN_EMAIL, $tbAdminEmail, $comparison);

        return $this;
    }

    /**
     * Filter the query on the tb_admin_password column
     *
     * Example usage:
     * <code>
     * $query->filterByTbAdminPassword('fooValue');   // WHERE tb_admin_password = 'fooValue'
     * $query->filterByTbAdminPassword('%fooValue%', Criteria::LIKE); // WHERE tb_admin_password LIKE '%fooValue%'
     * $query->filterByTbAdminPassword(['foo', 'bar']); // WHERE tb_admin_password IN ('foo', 'bar')
     * </code>
     *
     * @param string|string[] $tbAdminPassword The value to use as filter.
     * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this The current query, for fluid interface
     */
    public function filterByTbAdminPassword($tbAdminPassword = null, ?string $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tbAdminPassword)) {
                $comparison = Criteria::IN;
            }
        }

        $this->addUsingAlias(AdminTableMap::COL_TB_ADMIN_PASSWORD, $tbAdminPassword, $comparison);

        return $this;
    }

    /**
     * Exclude object from result
     *
     * @param ChildAdmin $admin Object to remove from the list of results
     *
     * @return $this The current query, for fluid interface
     */
    public function prune($admin = null)
    {
        if ($admin) {
            $this->addUsingAlias(AdminTableMap::COL_ID, $admin->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tb_admin table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(?ConnectionInterface $con = null): int
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AdminTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AdminTableMap::clearInstancePool();
            AdminTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(AdminTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AdminTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            AdminTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AdminTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

}
