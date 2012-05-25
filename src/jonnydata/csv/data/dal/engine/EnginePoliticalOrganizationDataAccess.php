<?php
/**
 * Objetos de acesso a dados em formulários e outros sites de transparência do
 * projeto Conheça seu Vereador
 * @package jonnydata\csv\data\dal\engine
 */
namespace jonnydata\csv\data\dal\engine;

use \BadMethodCallException;
use \DOMXPath;
use jonnydata\csv\data\dal\PoliticalOrganizationDataAccess;
use jonnydata\csv\data\PoliticalOrganization;
use jonnydata\csv\data\Councillor;
use jonnydata\csv\data\PoliticalParty;

class EnginePoliticalOrganizationDataAccess extends PoliticalOrganizationDataAccess {
	/**
	 * @var	EnginePoliticianDataAccess
	 */
	private $politicianDataAccess;
	
	/**
	 * @var	EngineRequester
	 */
	private $engineRequester;
	
	public function __construct(EngineRequester $engineRequester,
								EngineDataAccessFactory $engineDataAccessFactory) {

		$this->engineRequester = $engineRequester;
		$this->politicianDataAccess = $engineDataAccessFactory->createPoliticianDataAccess();
	}
	
	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.PoliticalOrganizationDataAccess::find()
	 */
	public function find(array $criteria) {
		$dom = $this->engineRequester->request('/vereadorespartido_joomla.asp',
												$criteria);
												
		$xpath = new DOMXPath($dom);
		$politicalOrganization = new PoliticalParty();
		$politicalOrganizations = array();
		$politicalOrganizationName = null;

		foreach ($xpath->query('.//td[@id="nome_partido"]/../../tr/td') as $td) {
			switch ($td->getAttribute('id')) {
				case 'logo2':
					$img = $td->childNodes->item(1);
					
					if ($img != null) {
						$politicalOrganization->setFlag(
							'http://www1.camara.sp.gov.br/'.
							$img->getAttribute('src')
						);
					}
					break;
				case 'nome_partido':
					$name = trim($td->nodeValue);
					
					$politicalOrganization->setName($name);
					
					if (!isset($politicalOrganizations[$name])) {
						$politicalOrganizations[$name] = $politicalOrganization;
						$politicalOrganizationName = $name;
						$politicalOrganization = new PoliticalParty();
					}
					break;
				default:
					$a = $td->childNodes->item(1);
					
					if ($a != null && $a->nodeName == 'a') {
						$href = $a->getAttribute('href');
						$criteria = $this->engineRequester->parseParameters($href);
						$politician = $this->politicianDataAccess->findOne($criteria);
						$politician->setPoliticalParty($politicalOrganization);
						
						//FIXME: Corrigir a URL do vereador
						$politician->setURL('http://www1.camara.sp.gov.br/'.$href);
						
						if (!empty($name)) {
							$politicalOrganizations[$politicalOrganizationName]->addPolitician($politician);
						}
					}
					
					break;
			}
		}
		
		return $politicalOrganizations;
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.PoliticalOrganizationDataAccess::findAll()
	 */
	public function findAll() {
		return $this->find(array('col1' => 14,
								 'col2' => 21,
								 'col3' => 26
								));
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.PoliticalOrganizationDataAccess::findOne()
	 */
	public function findOne(array $criteria) {
		$list = $this->find($criteria);
		
		return array_shift($list);
	}

	/**
	 * A engine não salva, atualiza ou remove dados. Esse método sempre dispara
	 * uma BadMethodCallException.
	 * @see jonnydata\csv\data\dal.PoliticalOrganizationDataAccess::remove()
	 * @throws BadMethodCallException
	 */
	public function remove(array $criteria) {
		throw new BadMethodCallException('Not implemented');
	}

	/**
	 * A engine não salva, atualiza ou remove dados. Esse método sempre dispara
	 * uma BadMethodCallException.
	 * @see jonnydata\csv\data\dal.PoliticalOrganizationDataAccess::save()
	 * @throws BadMethodCallException
	 */
	public function save(PoliticalOrganization $politicalOrganization) {
		throw new BadMethodCallException('Not implemented');
	}

	/**
	 * A engine não salva, atualiza ou remove dados. Esse método sempre dispara
	 * uma BadMethodCallException.
	 * @see jonnydata\csv\data\dal.PoliticalOrganizationDataAccess::update()
	 * @throws BadMethodCallException
	 */
	public  function update(PoliticalOrganization $politicalOrganization,
							array $criteria) {

		throw new BadMethodCallException('Not implemented');
	}
}