<?php
namespace tests\jonnydata\csv\data;

use jonnydata\csv\data\PoliticianFactory;

class PoliticianFactoryTest extends \PHPUnit_Framework_TestCase {
	public function test_fromJSON() {
		$json = array(
			'bio' => 'a',
			'birthday' => 'b',
			'contacts' => array(),
			'history' => 'c',
			'name' => 'd',
			'photo' => 'e'
		);
		$result = PoliticianFactory::fromJSON($json);
		$this->assertInstanceOf('jonnydata\csv\data\Councillor', $result);
		$this->assertEquals($json['bio'], $result->getBio());
		$this->assertEquals($json['birthday'], $result->getBirthday());
		$this->assertEquals($json['contacts'], $result->getContactIterator()->getArrayCopy());
		$this->assertEquals($json['history'], $result->getHistory());
		$this->assertEquals($json['name'], $result->getName());
		$this->assertEquals($json['photo'], $result->getPhoto());
	}

	public function test_fromJSONCollection() {
		$item = array('name' => 'd');
		$collection = array($item);
		$result = PoliticianFactory::fromJSONCollection($collection);
		$this->assertCount(1, $result);
		$this->assertInstanceOf('jonnydata\csv\data\Councillor', $result[0]);
		$this->assertEquals($item['name'], $result[0]->getName());
	}
}