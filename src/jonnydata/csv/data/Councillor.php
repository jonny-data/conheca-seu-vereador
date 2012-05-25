<?php
/**
 * Objetos e interfaces de acesso a dados do projeto Conheça seu Vereador
 * @package jonnydata\csv\data
 */
namespace jonnydata\csv\data;

use \ArrayIterator;
/**
 * Representação de um vereador.
 */
class Councillor extends Politician {
	/**
	 * @var array[Bill]
	 */
	private $bills = array();
	
	/**
	 * @var PoliticalParty
	 */
	private $politicalParty;
	
	/**
	 * Adiciona um projeto elaborado pelo vereador.
	 * @param Bill $bill
	 */
	public function addBill(Bill $bill) {
		$this->bills[] = $bill;
	}
	
	/**
	 * Recupera um Iterator com os projetos propostos pelo vereador.
	 * @return Iterator[Bill]
	 */
	public function getBillIterator() {
		return new ArrayIterator($this->bills);
	}
	
	/**
	 * @return PoliticalParty
	 */
	public function getPoliticalParty() {
		return $this->politicalParty;
	}

	/**
	 * @param PoliticalParty $politicalParty
	 */
	public function setPoliticalParty($politicalParty) {
		$this->politicalParty = $politicalParty;
	}
}