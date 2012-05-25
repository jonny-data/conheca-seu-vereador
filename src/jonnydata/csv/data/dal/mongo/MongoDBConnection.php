<?php
class MongoDBConnection{
	public function __construct($db = 'conhecaseupolitico', $collection = 'user'){
		$this->connection = new Mongo();
		$this->db = $this->db;
		$this->collection = $this->collection;
		
	}
}
?>