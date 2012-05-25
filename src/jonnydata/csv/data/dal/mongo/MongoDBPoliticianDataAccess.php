<?php
/**
 * Objetos de acesso a dados em base MongoDB do projeto Conheça seu Vereador
 * @package jonnydata\csv\data\dal\mongo
 */
namespace jonnydata\csv\data\dal\mongo;

use jonnydata\csv\data\Politician;
use jonnydata\csv\data\dal\PoliticianDataAccess;
use jonnydata\csv\data\dal\mongo\MongoDBConnection;
use jonnydata\csv\data\PoliticianFactory;

class MongoDBPoliticianDataAccess extends PoliticianDataAccess {
	public function __construct(MongoDBConnection $connection) {
		$this->connection = $connection;
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.PoliticianDataAccess::find()
	 */
	public function find(array $criteria) {
		return PoliticianFactory::fromJSONCollection($this->connection->find('politics', $criteria));
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.PoliticianDataAccess::findAll()
	 */
	public function findAll() {
		return PoliticianFactory::fromJSONCollection($this->connection->find('politics'));
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.PoliticianDataAccess::findOne()
	 */
	public function findOne(array $criteria) {
		return PoliticianFactory::fromJSON($this->connection->findOne('politics', $criteria));
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.PoliticianDataAccess::remove()
	 */
	public function remove(array $criteria) {
		return $this->connection->remove('politics', $criteria, true);
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.PoliticianDataAccess::save()
	 */
	public function save(Politician $politician) {
		$this->connection->save('politics', $politician->toJSON());
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.PoliticianDataAccess::update()
	 */
	public function update(Politician $politician, array $criteria) {
		return $this->connection->update('politics', $criteria, $politician->toJSON());
	}
}