<?php
/**
 * Objetos e interfaces de acesso a dados do projeto Conheça seu Vereador
 * @package jonnydata\csv\data
 */
namespace jonnydata\csv\data;

use \ArrayIterator;

/**
 * Representação de uma sessão na câmara.
 */
class Session {
	/**
	 * @var string
	 */
	private $date;
	
	/**
	 * @var array
	 */
	private $presence = array();
	
	/**
	 * @var string
	 */
	private $type;
	
	/**
	 * @var array[Video]
	 */
	private $videos = array();
	
	/**
	 * Adiciona um vídeo da sessão.
	 * @param Video $video
	 */
	public function addVideo(Video $video) {
		$this->videos[] = $video;
	}
	
	/**
	 * Define a presença de um político.
	 * @param Politician $politician
	 * @param boolean $presence
	 */
	public function defineSessionPresence(Politician $politician, $presence ) {
		$this->presence[$politician] = $presence;
	}
	
	/**
	 * @return string
	 */
	public function getDate() {
		return $this->date;
	}

	/**
	 * @return Iterator
	 */
	public function getPresenceIterator() {
		return new ArrayIterator($this->presence);
	}

	/**
	 * @return string
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * @return Iterator[Video]
	 */
	public function getVideoIterator() {
		return new ArrayIterator($this->videos);
	}

	/**
	 * @param string $date
	 */
	public function setDate($date) {
		$this->date = $date;
	}

	/**
	 * @param string $type
	 */
	public function setType($type) {
		$this->type = $type;
	}
}