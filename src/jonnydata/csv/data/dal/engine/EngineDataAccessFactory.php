<?php
/**
 * Objetos de acesso a dados em formulários e outros sites de transparência do
 * projeto Conheça seu Vereador
 * @package jonnydata\csv\data\dal\engine
 */
namespace jonnydata\csv\data\dal\engine;

use jonnydata\csv\data\dal\AbstractDataAccessFactory;

class EngineDataAccessFactory extends AbstractDataAccessFactory {
	/**
	 * @var	EngineRequester
	 */
	private $engineRequester;
	
	public function __construct() {
		$this->engineRequester = new EngineRequester();
	}
	
	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.AbstractDataAccessFactory::createBillDataAccess()
	 */
	public function createBillDataAccess() {
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.AbstractDataAccessFactory::createElectoralCoalitionDataAccess()
	 */
	public function createElectoralCoalitionDataAccess() {
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.AbstractDataAccessFactory::createPoliticalOrganizationDataAccess()
	 */
	public function createPoliticalOrganizationDataAccess() {
		return new EnginePoliticalOrganizationDataAccess($this->engineRequester,
														 $this);
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.AbstractDataAccessFactory::createPoliticianDataAccess()
	 */
	public function createPoliticianDataAccess() {
		return new EnginePoliticianDataAccess($this->engineRequester,$this);
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.AbstractDataAccessFactory::createSessionDataAccess()
	 */
	public function createSessionDataAccess() {
	}
}