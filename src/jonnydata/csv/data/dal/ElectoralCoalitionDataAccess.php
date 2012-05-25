<?php
/**
 * Camada de abstração de dados do projeto Conheça seu Vereador
 * @package jonnydata\csv\data\dal
 */
namespace jonnydata\csv\data\dal;

use jonnydata\csv\data\ElectoralCoalition;

/**
 * Acesso a dados de coligações políticas.
 */
abstract class ElectoralCoalitionDataAccess {
	/**
	 * Encontra as coligações políticas segundo um critério.
	 * @param array $criteria
	 * @return array[ElectoralCoalition]
	 */
	public abstract function find(array $criteria);
	
	/**
	 * Encontra uma coligação política segundo um critério.
	 * @param array $criteria
	 * @return ElectoralCoalition
	 */
	public abstract function findOne(array $criteria);
	
	/**
	 * Encontra todas as coligações políticas.
	 * @return array[ElectoralCoalition]
	 */
	public abstract function findAll();
	
	/**
	 * Salva uma coligação.
	 * @param ElectoralCoalition $electoralCoalition
	 */
	public abstract function save(ElectoralCoalition $electoralCoalition);
	
	/**
	 * Remove uma coligação política segundo um critério.
	 * @param array $criteria
	 */
	public abstract function remove(array $criteria);
	
	/**
	 * Atualiza uma coligação política.
	 * @param ElectoralCoalition $electoralCoalition
	 * @param array $criteria
	 * @return ElectoralCoalition
	 */
	public abstract function update(ElectoralCoalition $electoralCoalition,
									array $criteria);
}