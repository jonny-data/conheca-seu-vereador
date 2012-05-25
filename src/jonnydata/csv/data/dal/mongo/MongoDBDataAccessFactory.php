<?php
/**
 * Objetos de acesso a dados em base MongoDB do projeto Conheça seu Vereador
 * @package jonnydata\csv\data\dal\mongo
 */
namespace jonnydata\csv\data\dal\mongo;

use jonnydata\csv\data\dal\mongo\MongoDBConnection;
use jonnydata\csv\data\dal\AbstractDataAccessFactory;

/**
 * Fábrica de objetos de acesso a dados em base MongoDB.
 */
class MongoDBDataAccessFactory extends AbstractDataAccessFactory {
	protected $connection;

	public function __construct(MongoDBConnection $connection = null) {
		$this->connection = $connection;

		if (is_null($this->connection)) {
			$this->connection = new MongoDBConnection('conhecaseupolitico', 'vereador');
		}
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.AbstractDataAccessFactory::createBillDataAccess()
	 */
	public function createBillDataAccess() {
		return new MongoDBBillDataAccess($this->connection);
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.AbstractDataAccessFactory::createElectoralCoalitionDataAccess()
	 */
	public function createElectoralCoalitionDataAccess() {
		return new MongoDBElectoralCoalitionDataAccess($this->connection);
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.AbstractDataAccessFactory::createPoliticalOrganizationDataAccess()
	 */
	public function createPoliticalOrganizationDataAccess() {
		return new MongoDBPoliticalOrganizationDataAccess($this->connection);
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.AbstractDataAccessFactory::createPoliticianDataAccess()
	 */
	public function createPoliticianDataAccess() {
		return new MongoDBPoliticianDataAccess($this->connection);
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.AbstractDataAccessFactory::createSessionDataAccess()
	 */
	public function createSessionDataAccess() {
		return new MongoDBSessionDataAccess($this->connection);
	}
}