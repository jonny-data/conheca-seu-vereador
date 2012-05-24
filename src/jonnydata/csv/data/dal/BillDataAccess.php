<?php
/**
 * Camada de abstração de dados do projeto Conheça seu Vereador
 * @package jonnydata\csv\data\dal
 */
namespace jonnydata\csv\data\dal;

use jonnydata\csv\data\Bill;

/**
 * Acesso a dados de projetos.
 */
abstract class BillDataAccess {
	/**
	 * Encontra as projetos segundo um critério.
	 * @param array $criteria
	 * @return array[Bill]
	 */
	public abstract function find(array $criteria);
	
	/**
	 * Encontra uma projeto segundo um critério.
	 * @param array $criteria
	 * @return Bill
	 */
	public abstract function findOne(array $criteria);
	
	/**
	 * Encontra todas as projetos.
	 * @return array[Bill]
	 */
	public abstract function findAll();
	
	/**
	 * Salva uma organização.
	 * @param Bill $bill
	 */
	public abstract function save(Bill $bill);
	
	/**
	 * Remove uma projeto segundo um critério.
	 * @param array $criteria
	 */
	public abstract function remove(array $criteria);
	
	/**
	 * Atualiza uma projeto.
	 * @param Bill $bill
	 * @param array $criteria
	 * @return Bill
	 */
	public abstract function update(Bill $bill, array $criteria);
}