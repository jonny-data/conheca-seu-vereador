<?php
/**
 * Objetos de acesso a dados em base MongoDB do projeto Conheça seu Vereador
 * @package jonnydata\csv\data\dal\mongo
 */
namespace jonnydata\csv\data\dal\mongo;

use jonnydata\csv\data\dal\MongoDBConnection;
use jonnydata\csv\data\dal\AbstractDataAccessFactory;

/**
 * Fábrica de objetos de acesso a dados em base MongoDB.
 */
class MongoDBDataAccessFactory extends AbstractDataAccessFactory {
	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.AbstractDataAccessFactory::createBillDataAccess()
	 */
	public function createBillDataAccess(MongoDBConnection $mongo) {
		return new MongoDBBillDataAccess($mongo);
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.AbstractDataAccessFactory::createElectoralCoalitionDataAccess()
	 */
	public function createElectoralCoalitionDataAccess(MongoDBConnection $mongo) {
		return new MongoDBElectoralCoalitionDataAccess($mongo);
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.AbstractDataAccessFactory::createPoliticalOrganizationDataAccess()
	 */
	public function createPoliticalOrganizationDataAccess(MongoDBConnection $mongo) {
		return new MongoDBPoliticalOrganizationDataAccess($mongo);
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.AbstractDataAccessFactory::createPoliticianDataAccess()
	 */
	public function createPoliticianDataAccess(MongoDBConnection $mongo) {
		return new MongoDBPoliticianDataAccess($mongo);
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.AbstractDataAccessFactory::createSessionDataAccess()
	 */
	public function createSessionDataAccess(MongoDBConnection $mongo) {
		return new MongoDBSessionDataAccess($mongo);
	}
}