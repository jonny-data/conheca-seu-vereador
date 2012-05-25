<?php
/**
 * Objetos e interfaces de acesso a dados do projeto Conheça seu Vereador
 * @package jonnydata\csv\data
 */
namespace jonnydata\csv\data;

use \ArrayIterator;

/**
 * Representação de um partido político.
 */
class PoliticalParty extends PoliticalOrganization {
	/**
	 * @var ElectoralCoalition
	 */
	private $electoralCoalition;
	
	/**
	 * @var array[Politician]
	 */
	private $politicians = array();
	
	/**
	 * Adiciona um político ao partido político.
	 * @param Politician $politician
	 */
	public function addPolitician(Politician $politician) {
		$this->politicians[] = $politician;
	}
	
	/**
	 * @return ElectoralCoalition
	 */
	public function getElectoralCoalition() {
		return $this->electoralCoalition;
	}
	
	/**
	 * Recupera um Iterator de políticos do partido.
	 * @return Iterator[Politician]
	 */
	public function getPoliticianIterator() {
		return new ArrayIterator($this->politicians);
	}

	/**
	 * @param ElectoralCoalition $electoralCoalition
	 */
	public function setElectoralCoalition($electoralCoalition) {
		$this->electoralCoalition = $electoralCoalition;
	}
}