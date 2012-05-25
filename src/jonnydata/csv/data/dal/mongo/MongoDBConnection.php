<?php
/**
 * Objetos de acesso a dados em base MongoDB do projeto Conheça seu Vereador
 * @package jonnydata\csv\data\dal\mongo
 */

namespace jonnydata\csv\data\dal\mongo;

use \Mongo;

class MongoDBConnection{
	public function __construct($db = 'conhecaseupolitico', $collection = 'user'){
		$this->connection = new Mongo();
		$this->db = $db;
		$this->collection = $collection;
	}
}
?>