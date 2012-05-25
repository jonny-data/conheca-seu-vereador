<?php
/**
 * Objetos de acesso a dados em base MongoDB do projeto Conheça seu Vereador
 * @package jonnydata\csv\data\dal\mongo
 */

namespace tests\jonnydata\csv\data\dal\mongo;

use jonnydata\csv\data\dal\mongo\MongoDBPoliticianDataAccess;

class MongoDBPoliticianDataAccessTest extends \PHPUnit_Framework_TestCase {
	public $subject;

	public function setUp() {
		$this->connection = $this->getMock('jonnydata\csv\data\dal\mongo\MongoDBConnection');
		$this->subject = new MongoDBPoliticianDataAccess($this->connection);
	}

	public function tearDown() {
		unset($this->subject);
	}

	public function testFind() {
		$criteria = array('test' => 'value');
		$item = array('name' => 'a');
		$collection = array($item);
		$this->connection->expects($this->once())
			->method('find')
			->with(
				$this->equalTo('politics'),
				$this->equalTo($criteria)
			)
			->will($this->returnValue($collection));
		$result = $this->subject->find($criteria);
		$this->assertCount(1, $result);
		$this->assertInstanceOf('jonnydata\csv\data\Councillor', $result[0]);
		$this->assertEquals($item['name'], $result[0]->getName());
	}
}