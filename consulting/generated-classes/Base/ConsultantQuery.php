<?php

namespace Base;

use \Consultant as ChildConsultant;
use \ConsultantQuery as ChildConsultantQuery;
use \Exception;
use \PDO;
use Map\ConsultantTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'consultant' table.
 *
 *
 *
 * @method     ChildConsultantQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildConsultantQuery orderByLastname($order = Criteria::ASC) Order by the lastname column
 * @method     ChildConsultantQuery orderByEmail($order = Criteria::ASC) Order by the email column
 *
 * @method     ChildConsultantQuery groupById() Group by the id column
 * @method     ChildConsultantQuery groupByLastname() Group by the lastname column
 * @method     ChildConsultantQuery groupByEmail() Group by the email column
 *
 * @method     ChildConsultantQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildConsultantQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildConsultantQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildConsultantQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildConsultantQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildConsultantQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildConsultantQuery leftJoinConsulting($relationAlias = null) Adds a LEFT JOIN clause to the query using the Consulting relation
 * @method     ChildConsultantQuery rightJoinConsulting($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Consulting relation
 * @method     ChildConsultantQuery innerJoinConsulting($relationAlias = null) Adds a INNER JOIN clause to the query using the Consulting relation
 *
 * @method     ChildConsultantQuery joinWithConsulting($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Consulting relation
 *
 * @method     ChildConsultantQuery leftJoinWithConsulting() Adds a LEFT JOIN clause and with to the query using the Consulting relation
 * @method     ChildConsultantQuery rightJoinWithConsulting() Adds a RIGHT JOIN clause and with to the query using the Consulting relation
 * @method     ChildConsultantQuery innerJoinWithConsulting() Adds a INNER JOIN clause and with to the query using the Consulting relation
 *
 * @method     \ConsultingQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildConsultant findOne(ConnectionInterface $con = null) Return the first ChildConsultant matching the query
 * @method     ChildConsultant findOneOrCreate(ConnectionInterface $con = null) Return the first ChildConsultant matching the query, or a new ChildConsultant object populated from the query conditions when no match is found
 *
 * @method     ChildConsultant findOneById(int $id) Return the first ChildConsultant filtered by the id column
 * @method     ChildConsultant findOneByLastname(string $lastname) Return the first ChildConsultant filtered by the lastname column
 * @method     ChildConsultant findOneByEmail(string $email) Return the first ChildConsultant filtered by the email column *

 * @method     ChildConsultant requirePk($key, ConnectionInterface $con = null) Return the ChildConsultant by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildConsultant requireOne(ConnectionInterface $con = null) Return the first ChildConsultant matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildConsultant requireOneById(int $id) Return the first ChildConsultant filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildConsultant requireOneByLastname(string $lastname) Return the first ChildConsultant filtered by the lastname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildConsultant requireOneByEmail(string $email) Return the first ChildConsultant filtered by the email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildConsultant[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildConsultant objects based on current ModelCriteria
 * @method     ChildConsultant[]|ObjectCollection findById(int $id) Return ChildConsultant objects filtered by the id column
 * @method     ChildConsultant[]|ObjectCollection findByLastname(string $lastname) Return ChildConsultant objects filtered by the lastname column
 * @method     ChildConsultant[]|ObjectCollection findByEmail(string $email) Return ChildConsultant objects filtered by the email column
 * @method     ChildConsultant[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ConsultantQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ConsultantQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'consulting', $modelName = '\\Consultant', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildConsultantQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildConsultantQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildConsultantQuery) {
            return $criteria;
        }
        $query = new ChildConsultantQuery();
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
     * @return ChildConsultant|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ConsultantTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ConsultantTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildConsultant A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, lastname, email FROM consultant WHERE id = :p0';
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
            /** @var ChildConsultant $obj */
            $obj = new ChildConsultant();
            $obj->hydrate($row);
            ConsultantTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildConsultant|array|mixed the result, formatted by the current formatter
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
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
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
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildConsultantQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ConsultantTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildConsultantQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ConsultantTableMap::COL_ID, $keys, Criteria::IN);
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
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildConsultantQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ConsultantTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ConsultantTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ConsultantTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the lastname column
     *
     * Example usage:
     * <code>
     * $query->filterByLastname('fooValue');   // WHERE lastname = 'fooValue'
     * $query->filterByLastname('%fooValue%', Criteria::LIKE); // WHERE lastname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lastname The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildConsultantQuery The current query, for fluid interface
     */
    public function filterByLastname($lastname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastname)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ConsultantTableMap::COL_LASTNAME, $lastname, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildConsultantQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ConsultantTableMap::COL_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query by a related \Consulting object
     *
     * @param \Consulting|ObjectCollection $consulting the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildConsultantQuery The current query, for fluid interface
     */
    public function filterByConsulting($consulting, $comparison = null)
    {
        if ($consulting instanceof \Consulting) {
            return $this
                ->addUsingAlias(ConsultantTableMap::COL_ID, $consulting->getConsultantK(), $comparison);
        } elseif ($consulting instanceof ObjectCollection) {
            return $this
                ->useConsultingQuery()
                ->filterByPrimaryKeys($consulting->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByConsulting() only accepts arguments of type \Consulting or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Consulting relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildConsultantQuery The current query, for fluid interface
     */
    public function joinConsulting($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Consulting');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Consulting');
        }

        return $this;
    }

    /**
     * Use the Consulting relation Consulting object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ConsultingQuery A secondary query class using the current class as primary query
     */
    public function useConsultingQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinConsulting($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Consulting', '\ConsultingQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildConsultant $consultant Object to remove from the list of results
     *
     * @return $this|ChildConsultantQuery The current query, for fluid interface
     */
    public function prune($consultant = null)
    {
        if ($consultant) {
            $this->addUsingAlias(ConsultantTableMap::COL_ID, $consultant->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the consultant table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ConsultantTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ConsultantTableMap::clearInstancePool();
            ConsultantTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ConsultantTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ConsultantTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ConsultantTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ConsultantTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ConsultantQuery
