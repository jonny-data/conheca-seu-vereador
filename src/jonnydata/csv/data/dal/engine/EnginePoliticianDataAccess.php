<?php
/**
 * Objetos de acesso a dados em formulários e outros sites de transparência do
 * projeto Conheça seu Vereador
 * @package jonnydata\csv\data\dal\engine
 */
namespace jonnydata\csv\data\dal\engine;

use jonnydata\csv\data\Contact;

use jonnydata\csv\data\Councillor;

use \BadMethodCallException;
use \DOMXPath;
use jonnydata\csv\data\dal\PoliticianDataAccess;
use jonnydata\csv\data\Politician;

class EnginePoliticianDataAccess extends PoliticianDataAccess {
	/**
	 * @var	EngineRequester
	 */
	private $engineRequester;
	
	/**
	 * @var string
	 */
	private $hostURL;
	
	public function __construct(EngineRequester $engineRequester,
								EngineDataAccessFactory $engineDataAccessFactory) {

		$this->engineRequester = $engineRequester;
		$this->hostURL = 'http://' . $this->engineRequester->getHostURL() . '/';
	}
	
	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.PoliticianDataAccess::find()
	 */
	public function find(array $criteria) {
		$dom = $this->engineRequester->request('/vereador_joomla2.asp',
												$criteria);

		$xpath = new DOMXPath($dom);
		$politician = new Councillor();
		
		$img = $xpath->query('.//table[@id="Table2"]/tr/td/img')->item(0);
		$name = $xpath->query('.//table/tr/td/b/font[@id="nome_vereador"]')->item(0);
		$bio = $xpath->query('.//table/tr/td/p')->item(2);
		
		if ($img != null) {
			$politician->setPhoto($this->hostURL.$img->getAttribute('src'));
		}
		
		if ($name != null) {
			$politician->setName($name->nodeValue);
		}
		
		if ($bio != null) {
			$politician->setBio(str_replace("\n", ' ', $bio->nodeValue));
		}
		
		//contatos do vereador
		foreach ($xpath->query('.//table[@id="FaleVereador"]/tr/td') as $contact) {
			$matches = array();
			
			if (preg_match_all("/\n?(?<type>[^:]+):(?<value>[^\n]+)\n/", $contact->nodeValue,$matches)) {
				foreach ($matches['type'] as $offset => $type) {
					$value = trim($matches['value'][$offset]);
					
					if ( !empty($value)) {
						$contact = new Contact();
						$contact->setType($type);
						$contact->setValue($value);
						$politician->addContact($contact);
					}
				}
			}
		}
		
//		foreach ($xpath->query('.//div[@id="paineldireito"]/a') as $project) {
//			$match = array();
//			$onclick = str_replace('\'', '"', $project->getAttribute('onclick'));
//			
//			if (preg_match('/window.open\("(?<project>[^"]+)".*\)/', $onclick, $match)){
//				var_dump($match['project']);
//			}
//		}
		
		return array($politician);
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.PoliticianDataAccess::findAll()
	 */
	public function findAll() {
		return array();
	}

	/* (non-PHPdoc)
	 * @see jonnydata\csv\data\dal.PoliticianDataAccess::findOne()
	 */
	public function findOne(array $criteria) {
		$list = $this->find($criteria);
		
		return array_shift($list);
	}

	/**
	 * A engine não salva, atualiza ou remove dados. Esse método sempre dispara
	 * uma BadMethodCallException.
	 * @see jonnydata\csv\data\dal.PoliticianDataAccess::remove()
	 * @throws BadMethodCallException
	 */
	public function remove(array $criteria) {
		throw new BadMethodCallException('Not implemented');
	}

	/**
	 * A engine não salva, atualiza ou remove dados. Esse método sempre dispara
	 * uma BadMethodCallException.
	 * @see jonnydata\csv\data\dal.PoliticianDataAccess::save()
	 * @throws BadMethodCallException
	 */
	public function save(Politician $politician) {
		throw new BadMethodCallException('Not implemented');
	}

	/**
	 * A engine não salva, atualiza ou remove dados. Esse método sempre dispara
	 * uma BadMethodCallException.
	 * @see jonnydata\csv\data\dal.PoliticianDataAccess::update()
	 * @throws BadMethodCallException
	 */
	public function update(Politician $politician, array $criteria) {
		throw new BadMethodCallException('Not implemented');
	}
}