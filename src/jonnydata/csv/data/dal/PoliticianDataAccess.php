<?php
/**
 * Camada de abstração de dados do projeto Conheça seu Vereador
 * @package jonnydata\csv\data\dal
 */
namespace jonnydata\csv\data\dal;

use jonnydata\csv\data\Politician;

/**
 * Acesso a dados de políticos.
 */
abstract class PoliticianDataAccess {
	/**
	 * Encontra os políticos segundo um critério.
	 * @param array $criteria
	 * @return array[jonnydata\csv\data\Politician]
	 */
	public abstract function find(array $criteria);
	
	/**
	 * Encontra uma político segundo um critério.
	 * @param array $criteria
	 * @return jonnydata\csv\data\Politician
	 */
	public abstract function findOne(array $criteria);
	
	/**
	 * Encontra todas as políticos.
	 * @return array[jonnydata\csv\data\Politician]
	 */
	public abstract function findAll();
	
	/**
	 * Salva uma organização.
	 * @param Politician $politician
	 */
	public abstract function save(Politician $politician);
	
	/**
	 * Remove uma político segundo um critério.
	 * @param array $criteria
	 */
	public abstract function remove(array $criteria);
	
	/**
	 * Atualiza uma político.
	 * @param Politician $politician
	 * @param array $criteria
	 * @return Politician
	 */
	public abstract function update(Politician $politician, array $criteria);
}