<?php
/**
 * Objetos e interfaces de acesso a dados do projeto Conheça seu Vereador
 * @package jonnydata\csv\data
 */
namespace jonnydata\csv\data;

use \ArrayIterator;

/**
 * Representação de uma coligação de campanha eleitoral.
 */
class ElectoralCoalition {
	/**
	 * @var	array[PoliticalParty]
	 */
	private $politicalParty = array();
	
	/**
	 * @var	string
	 */
	private $name;
	
	/**
	 * Constroi o objeto que representa uma coligação política definindo,
	 * opcionalmente, seu nome.
	 * @param string $name
	 */
	public function __construct($name = null) {
		if ($name !== null) {
			$this->setName($name);
		}
	}
	
	/**
	 * Adiciona um partido polítido à coligação política.
	 * @param PoliticalParty $politicalParty
	 */
	public function addPoliticalParty(PoliticalParty $politicalParty) {
		$this->politicalParty[] = $politicalParty;
	}

	/**
	 * Recupera o nome da coligação política.
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}
	
	/**
	 * Recupera um Iterator com os partidos políticos da coligação.
	 * @return Iterator[PoliticalParty]
	 */
	public function getPoliticalPartyIterator() {
		return new ArrayIterator($this->politicalParty);
	}
	
	/**
	 * Define o nome da coligação política.
	 * @param string $name
	 */
	public function setName($name) {
		$this->name = $name;
	}
}