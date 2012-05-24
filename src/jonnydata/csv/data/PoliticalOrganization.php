<?php
/**
 * Objetos e interfaces de acesso a dados do projeto Conheça seu Vereador
 * @package jonnydata\csv\data
 */
namespace jonnydata\csv\data;

use \ArrayIterator;

/**
 * Base para criação de uma classe que representa uma organização política.
 */
abstract class PoliticalOrganization {
	/**
	 * @var array[Contact]
	 */
	private $contacts = array();
	
	/**
	 * @var string
	 */
	private $flag;
	
	/**
	 * @var string
	 */
	private $name;
	
	/**
	 * Adiciona um contato da organização política.
	 * @param Contact $contact
	 */
	public function addContact(Contact $contact) {
		$this->contacts[] = $contact;
	}
	
	/**
	 * Recupera um Iterator com os contatos da organização política.
	 * @return Iterator[Contact]
	 */
	public function getContactIterator() {
		return new ArrayIterator($this->contacts);
	}
	
	/**
	 * @return string
	 */
	public function getFlag() {
		return $this->flag;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string $flag
	 */
	public function setFlag($flag) {
		$this->flag = $flag;
	}

	/**
	 * @param string $name
	 */
	public function setName($name) {
		$this->name = $name;
	}
}