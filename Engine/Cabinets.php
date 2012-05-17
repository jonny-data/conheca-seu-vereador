<?php 

namespace Engine;

class Cabinets {
	public $cabinets;

	public function parse($html) {
		$document = new CabinetsDocument($html);
		$this->cabinets = $document->cabinets();
		unset($document);
	}

	public function toJSON() {
		$result = array();
		foreach ($this->cabinets as $cabinet) {
			list($name, ) = explode('-', $cabinet['name']);
			$result[] = array(
				'name' => trim($name),
				'floor' => trim($cabinet['floor']),
				'room' => trim($cabinet['room']),
				'branch' => explode(' - ', $cabinet['branch'])
			);
		}
		return $result;
	}
}