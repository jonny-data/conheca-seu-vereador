<?php
/**
 * Camada de abstração de dados do projeto Conheça seu Vereador
 * @package jonnydata\csv\data\dal
 */
namespace jonnydata\csv\data\dal;

/**
 * Fábrica abstrata de objetos de acesso a dados
 */
abstract class AbstractDataAccessFactory {
	/**
	 * Cria o objeto de acesso a dados de projetos.
	 * @return BillDataAccess
	 */
	public abstract function createBillDataAccess();
	
	/**
	 * Cria o objeto de acesso a dados de organizações políticas.
	 * @return PoliticalOrganizationDataAccess
	 */
	public abstract function createElectoralCoalitionDataAccess();
	
	/**
	 * Cria o objeto de acesso a dados de organizações políticas.
	 * @return PoliticalOrganizationDataAccess
	 */
	public abstract function createPoliticalOrganizationDataAccess();
	
	/**
	 * Cria o objeto de acesso a dados de políticos.
	 * @return PoliticianDataAccess
	 */
	public abstract function createPoliticianDataAccess();
	
	/**
	 * Cria o objeto de acesso a dados de sessões.
	 * @return SessionDataAccess
	 */
	public abstract function createSessionDataAccess();
}