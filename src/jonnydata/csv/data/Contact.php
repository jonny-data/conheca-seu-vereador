<?php
/**
 * Objetos e interfaces de acesso a dados do projeto Conheça seu Vereador
 * @package jonnydata\csv\data
 */
namespace jonnydata\csv\data;

/**
 * Representação de um contato.
 */
class Contact {
	/**
	 * @var string
	 */
	private $type;
	
	/**
	 * @var string
	 */
	private $value;
	
	/**
	 * @return string
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * @return string
	 */
	public function getValue() {
		return $this->value;
	}

	/**
	 * @param string $type
	 */
	public function setType($type) {
		$this->type = $type;
	}

	/**
	 * @param string $value
	 */
	public function setValue($value) {
		$this->value = $value;
	}
}