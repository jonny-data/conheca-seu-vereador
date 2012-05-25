<?php
/**
 * Objetos de acesso a dados em base MongoDB do projeto Conheça seu Vereador
 * @package jonnydata\csv\data\dal\mongo
 */
namespace jonnydata\csv\data\dal\mongo;

use jonnydata\csv\data\dal\AbstractDataAccessFactory;

/**
 * Fábrica de objetos de acesso a dados em base MongoDB.
 */
class MongoDBDataAccessFactory extends AbstractDataAccessFactory {
	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.AbstractDataAccessFactory::createBillDataAccess()
	 */
	public function createBillDataAccess() {
		return new MongoDBBillDataAccess();
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.AbstractDataAccessFactory::createElectoralCoalitionDataAccess()
	 */
	public function createElectoralCoalitionDataAccess() {
		return new MongoDBElectoralCoalitionDataAccess();
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.AbstractDataAccessFactory::createPoliticalOrganizationDataAccess()
	 */
	public function createPoliticalOrganizationDataAccess() {
		return new MongoDBPoliticalOrganizationDataAccess();
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.AbstractDataAccessFactory::createPoliticianDataAccess()
	 */
	public function createPoliticianDataAccess() {
		return new MongoDBPoliticianDataAccess();
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.AbstractDataAccessFactory::createSessionDataAccess()
	 */
	public function createSessionDataAccess() {
		return new MongoDBSessionDataAccess();
	}
}