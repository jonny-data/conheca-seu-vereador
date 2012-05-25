<?php
/**
 * Objetos e interfaces de acesso a dados do projeto Conheça seu Vereador
 * @package jonnydata\csv\data
 */
namespace jonnydata\csv\data;

/**
 * Representação de um projeto.
 */
class Bill {
	/**
	 * @var Politician
	 */
	private $politician;
	
	/**
	 * @var string
	 */
	private $number;
	
	/**
	 * @var string
	 */
	private $status;
	
	/**
	 * @var string
	 */
	private $text;
	
	/**
	 * @var string
	 */
	private $title;
	
	/**
	 * @return Politician
	 */
	public function getPolitician() {
		return $this->politician;
	}
	
	/**
	 * @return string
	 */
	public function getNumber() {
		return $this->number;
	}

	/**
	 * @return string
	 */
	public function getStatus() {
		return $this->status;
	}

	/**
	 * @return string
	 */
	public function getText() {
		return $this->text;
	}

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}
	
	/**
	 * @param Politician $politician
	 */
	public function setPolitician(Politician $politician) {
		$this->politician = $politician;
	}

	/**
	 * @param string $number
	 */
	public function setNumber($number) {
		$this->number = $number;
	}

	/**
	 * @param string $status
	 */
	public function setStatus($status) {
		$this->status = $status;
	}

	/**
	 * @param string $text
	 */
	public function setText($text) {
		$this->text = $text;
	}

	/**
	 * @param string $title
	 */
	public function setTitle($title) {
		$this->title = $title;
	}
}