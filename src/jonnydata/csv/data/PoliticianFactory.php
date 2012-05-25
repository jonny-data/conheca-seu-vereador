<?php 

namespace jonnydata\csv\data;
use jonnydata\csv\data\Councillor;

class PoliticianFactory {
	static public function fromJSON($json) {
		$result = new Councillor();
		$result->setBio(isset($json['bio']) ? $json['bio'] : null);
		$result->setBirthday(isset($json['birthday']) ? $json['birthday'] : null);
		self::contacts($result, isset($json['contacts']) ? $json['contacts'] : array());
		$result->setHistory(isset($json['history']) ? $json['history'] : null);
		$result->setName(isset($json['name']) ? $json['name'] : null);
		$result->setPhoto(isset($json['photo']) ? $json['photo'] : null);
		return $result;
	}

	public static function fromJSONCollection($collection) {
		$result = array();
		foreach ($collection as $item) {
			$result[] = self::fromJSON($item);
		}
		return $result;
	}

	static public function contacts(Politician $politician, $contacts) {
		foreach ($contacts as $contact) {
			$politician->addContact($contacts);
		}
	}
}