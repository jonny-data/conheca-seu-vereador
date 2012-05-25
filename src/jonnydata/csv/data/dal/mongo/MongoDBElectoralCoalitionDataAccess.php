<?php
/**
 * Objetos de acesso a dados em base MongoDB do projeto Conheça seu Vereador
 * @package jonnydata\csv\data\dal\mongo
 */
namespace jonnydata\csv\data\dal\mongo;

use jonnydata\csv\data\ElectoralCoalition;
use jonnydata\csv\data\dal\ElectoralCoalitionDataAccess;

class MongoDBElectoralCoalitionDataAccess extends ElectoralCoalitionDataAccess {
	public function __construct(MongoDBConnection $mongo) {
		$this->mongo = $mongo;
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.ElectoralCoalitionDataAccess::find()
	 */
	public function find(array $criteria) {
		// TODO Auto-generated method stub
		return $this->mongo->collection->find($criteria);
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.BillDataAccess::findAll()
	 */
	public function findAll() {
		// TODO Auto-generated method stub
		return $this->mongo->collection->find();
		
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.BillDataAccess::findOne()
	 */
	public function findOne(array $criteria) {
		// TODO Auto-generated method stub
		return $this->mongo->collection->findOne($criteria);
		
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.BillDataAccess::remove()
	 */
	public function remove(array $criteria) {
		// TODO Auto-generated method stub
		return $this->mongo->collection->remove($criteria, true);
		
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.BillDataAccess::save()
	 */
	public function save(ElectoralCoalition $electoralCoalition) {
		// TODO Auto-generated method stub
		return $this->mongo->collection->save($electoralCoalition);
		
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.BillDataAccess::update()
	 */
	public function update(ElectoralCoalition $electoralCoalition,
									array $criteria) {
		// TODO Auto-generated method stub
		$multiple = true;
		$upsert = false;
		$options = array("multiple" => $multiple, "upsert" => $upsert);
		return $this->mongo->collection->save($criteria, $bill, $options);
	}
}