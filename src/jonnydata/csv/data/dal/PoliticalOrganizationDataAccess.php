<?php
/**
 * Camada de abstração de dados do projeto Conheça seu Vereador
 * @package jonnydata\csv\data\dal
 */
namespace jonnydata\csv\data\dal;

use jonnydata\csv\data\PoliticalOrganization;

/**
 * Acesso a dados de organizações políticas.
 */
abstract class PoliticalOrganizationDataAccess {
	/**
	 * Encontra as organizações políticas segundo um critério.
	 * @param array $criteria
	 * @return array[PoliticalOrganization]
	 */
	public abstract function find(array $criteria);
	
	/**
	 * Encontra uma organização política segundo um critério.
	 * @param array $criteria
	 * @return PoliticalOrganization
	 */
	public abstract function findOne(array $criteria);
	
	/**
	 * Encontra todas as organizações políticas.
	 * @return array[PoliticalOrganization]
	 */
	public abstract function findAll();
	
	/**
	 * Salva uma organização.
	 * @param PoliticalOrganization $politicalOrganization
	 */
	public abstract function save(PoliticalOrganization $politicalOrganization);
	
	/**
	 * Remove uma organização política segundo um critério.
	 * @param array $criteria
	 */
	public abstract function remove(array $criteria);
	
	/**
	 * Atualiza uma organização política.
	 * @param PoliticalOrganization $politicalOrganization
	 * @param array $criteria
	 * @return PoliticalOrganization
	 */
	public abstract function update(PoliticalOrganization $politicalOrganization,
									array $criteria);
}