<?php
/**
 * Objetos de acesso a dados em formulários e outros sites de transparência do
 * projeto Conheça seu Vereador
 * @package jonnydata\csv\data\dal\engine
 */
namespace jonnydata\csv\data\dal\engine;

use \DOMDocument;
use \tidy;
use jonnydata\csv\data\dal\AbstractDataAccessFactory;
use jonnydata\http\HTTPConnection;
use jonnydata\http\HTTPResponse;
use jonnydata\http\HTTPRequest;

class EngineRequester {
	const DEFAULT_HOST = 'www1.camara.sp.gov.br';
	
	/**
	 * @var	HTTPConnection
	 */
	private $httpConnection;

	/**
	 * @var tidy
	 */
	private $tidy;
	
	/**
	 * @var array
	 */
	private $tidyConfig = array(
		'add-xml-decl' => true,
		'hide-comments' => true,
		'output-xml' => true,
		'new-inline-tags' => true,
		'wrap-script-literals' => false
	);
	
	/**
	 * Constroi o objeto engine.
	 */
	public function __construct() {
		$this->httpConnection = new HTTPConnection();
		$this->httpConnection->initialize('www1.camara.sp.gov.br');
		$this->tidy = new tidy();
		libxml_use_internal_errors(true);
	}
	
	public function getHostURL() {
		return $this->httpConnection->getHost();
	}
	
	private function getNormalizedDOM(HTTPResponse $httpResponse) {
		$this->tidy->parseString($httpResponse->getContent(),
								 $this->tidyConfig);
								 
		$this->tidy->cleanRepair();

		$dom = new DOMDocument();
		$dom->loadHTML($this->tidy->html());
		
		libxml_get_errors();
		libxml_clear_errors();
		
		return $dom;
	}
	
	/**
	 * Faz uma requisição HTTP e recupera um DOMDocument normalizado.
	 * @param string $path Caminho da requisição.
	 * @param array $params Parâmetros que serão enviados com a requisição.
	 * @param string $method Método de requisição HTTP.
	 * @return DOMDocument
	 */
	public function request($path, array $params = array(),$method=HTTPRequest::GET) {
		$this->httpConnection->clear();
		
		foreach ($params as $name => $value) {
			$this->httpConnection->setParam($name,$value);
		}
		
		return $this->getNormalizedDOM($this->httpConnection->execute($path, $method));
	}
	
	public function parseParameters($url) {
		$parameters = array();
		$urlparts = parse_url($url);
		
		if (isset($urlparts['query'])) {
			parse_str($urlparts['query'],$parameters);
		}
		
		return $parameters;
	}
}