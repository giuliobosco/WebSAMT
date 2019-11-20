<?php

namespace Base;

use \Consulting as ChildConsulting;
use \ConsultingQuery as ChildConsultingQuery;
use \Exception;
use \PDO;
use Map\ConsultingTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'consulting' table.
 *
 *
 *
 * @method     ChildConsultingQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildConsultingQuery orderByConsultantK($order = Criteria::ASC) Order by the consultant_k column
 * @method     ChildConsultingQuery orderByClientK($order = Criteria::ASC) Order by the client_k column
 *
 * @method     ChildConsultingQuery groupById() Group by the id column
 * @method     ChildConsultingQuery groupByConsultantK() Group by the consultant_k column
 * @method     ChildConsultingQuery groupByClientK() Group by the client_k column
 *
 * @method     ChildConsultingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildConsultingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildConsultingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildConsultingQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildConsultingQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildConsultingQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildConsultingQuery leftJoinConsultant($relationAlias = null) Adds a LEFT JOIN clause to the query using the Consultant relation
 * @method     ChildConsultingQuery rightJoinConsultant($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Consultant relation
 * @method     ChildConsultingQuery innerJoinConsultant($relationAlias = null) Adds a INNER JOIN clause to the query using the Consultant relation
 *
 * @method     ChildConsultingQuery joinWithConsultant($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Consultant relation
 *
 * @method     ChildConsultingQuery leftJoinWithConsultant() Adds a LEFT JOIN clause and with to the query using the Consultant relation
 * @method     ChildConsultingQuery rightJoinWithConsultant() Adds a RIGHT JOIN clause and with to the query using the Consultant relation
 * @method     ChildConsultingQuery innerJoinWithConsultant() Adds a INNER JOIN clause and with to the query using the Consultant relation
 *
 * @method     ChildConsultingQuery leftJoinClient($relationAlias = null) Adds a LEFT JOIN clause to the query using the Client relation
 * @method     ChildConsultingQuery rightJoinClient($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Client relation
 * @method     ChildConsultingQuery innerJoinClient($relationAlias = null) Adds a INNER JOIN clause to the query using the Client relation
 *
 * @method     ChildConsultingQuery joinWithClient($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Client relation
 *
 * @method     ChildConsultingQuery leftJoinWithClient() Adds a LEFT JOIN clause and with to the query using the Client relation
 * @method     ChildConsultingQuery rightJoinWithClient() Adds a RIGHT JOIN clause and with to the query using the Client relation
 * @method     ChildConsultingQuery innerJoinWithClient() Adds a INNER JOIN clause and with to the query using the Client relation
 *
 * @method     \ConsultantQuery|\ClientQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildConsulting findOne(ConnectionInterface $con = null) Return the first ChildConsulting matching the query
 * @method     ChildConsulting findOneOrCreate(ConnectionInterface $con = null) Return the first ChildConsulting matching the query, or a new ChildConsulting object populated from the query conditions when no match is found
 *
 * @method     ChildConsulting findOneById(int $id) Return the first ChildConsulting filtered by the id column
 * @method     ChildConsulting findOneByConsultantK(int $consultant_k) Return the first ChildConsulting filtered by the consultant_k column
 * @method     ChildConsulting findOneByClientK(int $client_k) Return the first ChildConsulting filtered by the client_k column *

 * @method     ChildConsulting requirePk($key, ConnectionInterface $con = null) Return the ChildConsulting by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildConsulting requireOne(ConnectionInterface $con = null) Return the first ChildConsulting matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildConsulting requireOneById(int $id) Return the first ChildConsulting filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildConsulting requireOneByConsultantK(int $consultant_k) Return the first ChildConsulting filtered by the consultant_k column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildConsulting requireOneByClientK(int $client_k) Return the first ChildConsulting filtered by the client_k column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildConsulting[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildConsulting objects based on current ModelCriteria
 * @method     ChildConsulting[]|ObjectCollection findById(int $id) Return ChildConsulting objects filtered by the id column
 * @method     ChildConsulting[]|ObjectCollection findByConsultantK(int $consultant_k) Return ChildConsulting objects filtered by the consultant_k column
 * @method     ChildConsulting[]|ObjectCollection findByClientK(int $client_k) Return ChildConsulting objects filtered by the client_k column
 * @method     ChildConsulting[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ConsultingQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ConsultingQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'consulting', $modelName = '\\Consulting', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildConsultingQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildConsultingQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildConsultingQuery) {
            return $criteria;
        }
        $query = new ChildConsultingQuery();
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
     * @return ChildConsulting|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ConsultingTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ConsultingTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildConsulting A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, consultant_k, client_k FROM consulting WHERE id = :p0';
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
            /** @var ChildConsulting $obj */
            $obj = new ChildConsulting();
            $obj->hydrate($row);
            ConsultingTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildConsulting|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildConsultingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ConsultingTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildConsultingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ConsultingTableMap::COL_ID, $keys, Criteria::IN);
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
     * @return $this|ChildConsultingQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ConsultingTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ConsultingTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ConsultingTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the consultant_k column
     *
     * Example usage:
     * <code>
     * $query->filterByConsultantK(1234); // WHERE consultant_k = 1234
     * $query->filterByConsultantK(array(12, 34)); // WHERE consultant_k IN (12, 34)
     * $query->filterByConsultantK(array('min' => 12)); // WHERE consultant_k > 12
     * </code>
     *
     * @see       filterByConsultant()
     *
     * @param     mixed $consultantK The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildConsultingQuery The current query, for fluid interface
     */
    public function filterByConsultantK($consultantK = null, $comparison = null)
    {
        if (is_array($consultantK)) {
            $useMinMax = false;
            if (isset($consultantK['min'])) {
                $this->addUsingAlias(ConsultingTableMap::COL_CONSULTANT_K, $consultantK['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($consultantK['max'])) {
                $this->addUsingAlias(ConsultingTableMap::COL_CONSULTANT_K, $consultantK['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ConsultingTableMap::COL_CONSULTANT_K, $consultantK, $comparison);
    }

    /**
     * Filter the query on the client_k column
     *
     * Example usage:
     * <code>
     * $query->filterByClientK(1234); // WHERE client_k = 1234
     * $query->filterByClientK(array(12, 34)); // WHERE client_k IN (12, 34)
     * $query->filterByClientK(array('min' => 12)); // WHERE client_k > 12
     * </code>
     *
     * @see       filterByClient()
     *
     * @param     mixed $clientK The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildConsultingQuery The current query, for fluid interface
     */
    public function filterByClientK($clientK = null, $comparison = null)
    {
        if (is_array($clientK)) {
            $useMinMax = false;
            if (isset($clientK['min'])) {
                $this->addUsingAlias(ConsultingTableMap::COL_CLIENT_K, $clientK['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($clientK['max'])) {
                $this->addUsingAlias(ConsultingTableMap::COL_CLIENT_K, $clientK['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ConsultingTableMap::COL_CLIENT_K, $clientK, $comparison);
    }

    /**
     * Filter the query by a related \Consultant object
     *
     * @param \Consultant|ObjectCollection $consultant The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildConsultingQuery The current query, for fluid interface
     */
    public function filterByConsultant($consultant, $comparison = null)
    {
        if ($consultant instanceof \Consultant) {
            return $this
                ->addUsingAlias(ConsultingTableMap::COL_CONSULTANT_K, $consultant->getId(), $comparison);
        } elseif ($consultant instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ConsultingTableMap::COL_CONSULTANT_K, $consultant->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByConsultant() only accepts arguments of type \Consultant or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Consultant relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildConsultingQuery The current query, for fluid interface
     */
    public function joinConsultant($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Consultant');

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
            $this->addJoinObject($join, 'Consultant');
        }

        return $this;
    }

    /**
     * Use the Consultant relation Consultant object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ConsultantQuery A secondary query class using the current class as primary query
     */
    public function useConsultantQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinConsultant($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Consultant', '\ConsultantQuery');
    }

    /**
     * Filter the query by a related \Client object
     *
     * @param \Client|ObjectCollection $client The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildConsultingQuery The current query, for fluid interface
     */
    public function filterByClient($client, $comparison = null)
    {
        if ($client instanceof \Client) {
            return $this
                ->addUsingAlias(ConsultingTableMap::COL_CLIENT_K, $client->getId(), $comparison);
        } elseif ($client instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ConsultingTableMap::COL_CLIENT_K, $client->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByClient() only accepts arguments of type \Client or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Client relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildConsultingQuery The current query, for fluid interface
     */
    public function joinClient($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Client');

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
            $this->addJoinObject($join, 'Client');
        }

        return $this;
    }

    /**
     * Use the Client relation Client object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \ClientQuery A secondary query class using the current class as primary query
     */
    public function useClientQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinClient($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Client', '\ClientQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildConsulting $consulting Object to remove from the list of results
     *
     * @return $this|ChildConsultingQuery The current query, for fluid interface
     */
    public function prune($consulting = null)
    {
        if ($consulting) {
            $this->addUsingAlias(ConsultingTableMap::COL_ID, $consulting->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the consulting table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ConsultingTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ConsultingTableMap::clearInstancePool();
            ConsultingTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ConsultingTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ConsultingTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ConsultingTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ConsultingTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ConsultingQuery
