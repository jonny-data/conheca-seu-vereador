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
    
    public function __construct(){
        $this->db = "conhecaseupolitico";
        $this->collection = "vereador";
        $this->mongo = new MongoDBConnection($this->db, $this->collection);
    }
	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.AbstractDataAccessFactory::createBillDataAccess()
	 */
	public function createBillDataAccess() {
		return new MongoDBBillDataAccess($this->mongo);
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.AbstractDataAccessFactory::createElectoralCoalitionDataAccess()
	 */
	public function createElectoralCoalitionDataAccess() {
		return new MongoDBElectoralCoalitionDataAccess($this->mongo);
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.AbstractDataAccessFactory::createPoliticalOrganizationDataAccess()
	 */
	public function createPoliticalOrganizationDataAccess() {
		return new MongoDBPoliticalOrganizationDataAccess($this->mongo);
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.AbstractDataAccessFactory::createPoliticianDataAccess()
	 */
	public function createPoliticianDataAccess() {
		return new MongoDBPoliticianDataAccess($this->mongo);
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.AbstractDataAccessFactory::createSessionDataAccess()
	 */
	public function createSessionDataAccess() {
		return new MongoDBSessionDataAccess($this->mongo);
	}
}