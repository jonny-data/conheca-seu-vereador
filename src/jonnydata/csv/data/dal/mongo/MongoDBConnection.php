<?php
/**
 * Objetos de acesso a dados em base MongoDB do projeto Conheça seu Vereador
 * @package jonnydata\csv\data\dal\mongo
 */

namespace jonnydata\csv\data\dal\mongo;

use \Mongo;
use \MongoId;

class MongoDBConnection {
	public $connection;
	protected $db;

	public function __construct($db = 'conhecaseupolitico') {
		$this->connection = new \Mongo();
		$this->db = $this->connection->selectDB($db);
	}
        
//        public function objectToArray($obj) {
//                $_arr = is_object($obj) ? get_object_vars($obj) : $obj;
//                foreach ($_arr as $key => $val) {                        
//                        $val = (is_array($val) || is_object($val)) ? $this->objectToArray($val) : $val;
//                        $arr[$key] = $val;
//                        var_dump($key);
//                }
//                return $arr;
//        }
        
	public function insert($collection, $data, $options = array()) {
		return $this->db->selectCollection($collection)->insert($data, $options);
	}
	public function save($collection, $data, $options = array()) {
		return $this->db->selectCollection($collection)->save($data, $options);
	}

	public function findOne($collection, $criteria = array(), $fields = array()) {
		return $this->db->selectCollection($collection)->findOne($this->criteria($criteria), $fields);
	}

	public function find($collection, $criteria = array(), $fields = array()) {
		return $this->db->selectCollection($collection)->find($this->criteria($criteria), $fields);
	}

	public function findAll($collection) {
		return $this->db->selectCollection($collection)->find();
	}

	public function update($collection, $criteria, $data, $options = array('upsert' => false, 'multiple' => true)) {
		return $this->db->selectCollection($collection)->update($this->criteria($criteria), array('$set' => $data), $options);
	}

	public function remove($collection, $criteria, $options = array()) {
		return $this->db->selectCollection($collection)->remove($this->criteria($criteria), $options);
	}

	protected function criteria($criteria) {
		if (is_a($criteria, 'MongoId')) {
			return array('_id' => $criteria);
		}
		if (is_string($criteria)) {
			return array('_id' => new MongoId($criteria));
		}
		return $criteria;
	}
}