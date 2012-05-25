<?php
/**
 * Objetos de acesso a dados em base MongoDB do projeto Conheça seu Vereador
 * @package jonnydata\csv\data\dal\mongo
 */
namespace jonnydata\csv\data\dal\mongo;

use jonnydata\csv\data\Politician;
use jonnydata\csv\data\dal\PoliticianDataAccess;
use jonnydata\csv\data\dal\mongo\MongoDBConnection;


class MongoDBPoliticianDataAccess extends PoliticianDataAccess {
    
    public function __construct(MongoDBConnection $mongo) {
        $this->mongo = $mongo;
    }
    
	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.PoliticianDataAccess::find()
	 */
	public function find(array $criteria) {
		return $this->mongo->collection->find($criteria);
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.PoliticianDataAccess::findAll()
	 */
	public function findAll() {
		return $this->mongo->collection->find();
		
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.PoliticianDataAccess::findOne()
	 */
	public function findOne(array $criteria) {
		return $this->mongo->collection->findOne($criteria);
		
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.PoliticianDataAccess::remove()
	 */
	public function remove(array $criteria) {
		return $this->mongo->collection->remove($criteria, true);
		
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.PoliticianDataAccess::save()
	 */
	public function save(Politician $politician) {
		$this->mongo->collection->save($politician);
		
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.PoliticianDataAccess::update()
	 */
	public function update(Politician $politician, array $criteria) {
        $multiple = true;
        $upsert = false;
        $options = array("multiple" => $multiple, "upsert" => $upsert);
		return $this->mongo->collection->save($criteria, $politician, $options);
		
	}
}