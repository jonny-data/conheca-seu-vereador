<?php
/**
 * Objetos de acesso a dados em formulários e outros sites de transparência do
 * projeto Conheça seu Vereador
 * @package jonnydata\csv\data\dal\engine
 */
namespace jonnydata\csv\data\dal\engine;

use \BadMethodCallException;
use jonnydata\csv\data\dal\BillDataAccess;

class EngineBillDataAccess extends BillDataAccess {
	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.BillDataAccess::find()
	 */
	public function find(array $criteria) {
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.BillDataAccess::findAll()
	 */
	public function findAll() {
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.BillDataAccess::findOne()
	 */
	public function findOne(array $criteria) {
	}

	/**
	 * A engine não salva, atualiza ou remove dados. Esse método sempre dispara
	 * uma BadMethodCallException.
	 * @see jonnydata\csv\data\dal.BillDataAccess::remove()
	 * @throws BadMethodCallException
	 */
	public function remove(array $criteria) {
		throw new BadMethodCallException('Not implemented');
	}

	/**
	 * A engine não salva, atualiza ou remove dados. Esse método sempre dispara
	 * uma BadMethodCallException.
	 * @see jonnydata\csv\data\dal.BillDataAccess::save()
	 * @throws BadMethodCallException
	 */
	public function save(Bill $bill) {
		throw new BadMethodCallException('Not implemented');
	}

	/**
	 * A engine não salva, atualiza ou remove dados. Esse método sempre dispara
	 * uma BadMethodCallException.
	 * @see jonnydata\csv\data\dal.BillDataAccess::update()
	 * @throws BadMethodCallException
	 */
	public function update(Bill $bill, array $criteria) {
		throw new BadMethodCallException('Not implemented');
	}
}