<?php
/**
 * Objetos de acesso a dados em base MongoDB do projeto Conheça seu Vereador
 * @package jonnydata\csv\data\dal\mongo
 */
namespace jonnydata\csv\data\dal\mongo;

use jonnydata\csv\data\dal\BillDataAccess;
use jonnydata\csv\data\Bill;

class MongoDBBillDataAccess extends BillDataAccess {
    
    public function __construct(MongoDBConnection $mongo) {
        $this->mongo = $mongo;
    }
    
	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.BillDataAccess::find()
	 */
	public function find(array $criteria) {
        $result = $this->mongo->collection->find($criteria);
        
        //retornar array de Bills
		//return ;
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.BillDataAccess::findAll()
	 */
	public function findAll() {
		return $this->mongo->collection->find();
		
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.BillDataAccess::findOne()
	 */
	public function findOne(array $criteria) {
		return $this->mongo->collection->findOne($criteria);
		
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.BillDataAccess::remove()
	 */
	public function remove(array $criteria) {
		return $this->mongo->collection->remove($criteria, true);
		
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.BillDataAccess::save()
	 */
	public function save(Bill $bill) {
		return $this->mongo->collection->save($bill);
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.BillDataAccess::update()
	 */
	public function update(Bill $bill, array $criteria) {
		$multiple = true;
		$upsert = false;
		$options = array("multiple" => $multiple, "upsert" => $upsert);
		$result = $this->mongo->collection->save($criteria, $bill, $options);

		//return $bill
	}
}