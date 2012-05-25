<?php
/**
 * Objetos de acesso a dados em formulários e outros sites de transparência do
 * projeto Conheça seu Vereador
 * @package jonnydata\csv\data\dal\engine
 */
namespace jonnydata\csv\data\dal\engine;

use jonnydata\csv\data\dal\AbstractDataAccessFactory;
use jonnydata\http\HTTPRequest;
use jonnydata\http\HTTPConnection;

class Engine {
	/**
	 * @var	AbstractDataAccessFactory
	 */
	private $sourceFactory;
	
	/**
	 * @var	AbstractDataAccessFactory
	 */
	private $targetFactory;
	
	public function __construct(AbstractDataAccessFactory $sourceFactory,
								AbstractDataAccessFactory $targetFactory = null) {

		$this->sourceFactory = $sourceFactory;
		$this->targetFactory = $targetFactory;
	}
	
	public function run($access_token) {
		set_time_limit(0);
		
		$politicalOrganizationDataAccess = $this->sourceFactory->createPoliticalOrganizationDataAccess();
		$httpConnection = new HTTPConnection();
		$httpConnection->initialize('graph.facebook.com',true);
		$httpConnection->setParam('access_token',$access_token);
		$httpConnection->setParam('name','Jonny Data');
		$httpConnection->setParam('caption','Conheça seu vereador');
		$httpConnection->setParam('description','Informações sobre seu vereador');
		
		//run for lifetime
		while (true) {
			foreach ($politicalOrganizationDataAccess->findAll() as $politicalOrganization) {
				foreach ($politicalOrganization->getPoliticianIterator() as $politician) {
					$httpConnection->setParam('message',
											   $politician->getName()."\n".
											   $politician->getBio()."\n".
											   $politician->getURL());

					//$httpConnection->setParam('source',$politician->getURL());
					$response = $httpConnection->execute('460052704020341/feed',
														 HTTPRequest::POST);
					
					sleep(3600);
				}
			}
		}
	}
}