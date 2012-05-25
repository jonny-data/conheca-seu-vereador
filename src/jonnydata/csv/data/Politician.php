<?php
/**
 * Objetos e interfaces de acesso a dados do projeto Conheça seu Vereador
 * @package jonnydata\csv\data
 */
namespace jonnydata\csv\data;

use \ArrayIterator;

/**
 * Base para criação de classes que representam um político.
 */
abstract class Politician {
	/**
	 * @var string
	 */
	private $bio;
	
	/**
	 * @var string
	 */
	private $birthday;
	
	/**
	 * @var array[Contact]
	 */
	private $contacts = array();
	
	/**
	 * @var string
	 */
	private $history;
	
	/**
	 * @var string
	 */
	private $name;
	
	/**
	 * @var string
	 */
	private $photo;
	
	/**
	 * Adiciona um contato do político.
	 * @param Contact $contact
	 */
	public function addContact(Contact $contact) {
		$this->contacts[] = $contact;
	}
	/**
	 * @return string
	 */
	public function getBio() {
		return $this->bio;
	}

	/**
	 * @return string
	 */
	public function getBirthday() {
		return $this->birthday;
	}
	
	/**
	 * Recupera um Iterator de contatos do político.
	 * @return Iterator[Contact]
	 */
	public function getContactIterator() {
		return new ArrayIterator($this->contacts);
	}

	/**
	 * @return string
	 */
	public function getHistory() {
		return $this->history;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @return string
	 */
	public function getPhoto() {
		return $this->photo;
	}

	/**
	 * @param string $bio
	 */
	public function setBio($bio) {
		$this->bio = $bio;
	}

	/**
	 * @param string $birthday
	 */
	public function setBirthday($birthday) {
		$this->birthday = $birthday;
	}

	/**
	 * @param string $history
	 */
	public function setHistory($history) {
		$this->history = $history;
	}

	/**
	 * @param string $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @param string $photo
	 */
	public function setPhoto($photo) {
		$this->photo = $photo;
	}
        
}