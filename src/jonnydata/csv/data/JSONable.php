<?php
/**
 * Objetos e interfaces de acesso a dados do projeto Conheça seu Vereador
 * @package jonnydata\csv\data
 */
namespace jonnydata\csv\data;

/**
 * Interface que provê um método para conversão do objeto para notação JSON.
 */
interface JSONable {
	/**
	 * Recupera a representação JSON do objeto.
	 * @return string
	 */
	public function toJSON();
}