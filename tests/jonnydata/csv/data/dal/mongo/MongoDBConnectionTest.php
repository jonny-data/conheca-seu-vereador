<?php
/**
 * Objetos de acesso a dados em base MongoDB do projeto Conheça seu Vereador
 * @package jonnydata\csv\data\dal\mongo
 */

namespace tests\jonnydata\csv\data\dal\mongo;

use jonnydata\csv\data\dal\mongo\MongoDBConnection;

class MongoDBConnectionTest extends \PHPUnit_Framework_TestCase {
	public $subject;

	public function setUp() {
		$this->subject = new MongoDBConnection('conhecaseupolitico_test');
	}

	public function tearDown() {
		$this->subject->connection->dropDB('conhecaseupolitico_test');
		unset($this->subject);
	}

	public function test_insert() {
		$expected = array('name' => 'Lorem Ipsum');
		$this->subject->insert('user', $expected);
		$result = $this->subject->findOne('user');
		$this->assertEquals($expected['name'], $result['name']);
	}

	public function test_finders() {
		$this->fixtures();
		$this->findAll();
		$this->find();
		$this->find_with_criteria();
		$this->findOne();
		$this->findOne_with_criteria();
	}

	public function findAll() {
		$this->assertCount(5, $this->subject->findAll('user'));
	}

	public function find() {
		$this->assertCount(5, $this->subject->find('user'));
	}

	public function find_with_criteria() {
		$this->assertCount(1, $this->subject->find('user', array('name' => 'Item 1')));
	}

	public function findOne() {
		$result = $this->subject->findOne('user');
		$this->assertArrayHasKey('name', $result);
	}

	public function findOne_with_criteria() {
		$this->fixtures();
		$result = $this->subject->findOne('user', array('name' => 'Item 3'));
		$this->assertEquals('Item 3', $result['name']);
	}

	public function fixtures($collection = 'user') {
		$this->subject->insert('user', array('name' => 'Item 1'));
		$this->subject->insert('user', array('name' => 'Item 2'));
		$this->subject->insert('user', array('name' => 'Item 3'));
		$this->subject->insert('user', array('name' => 'Item 4'));
		$this->subject->insert('user', array('name' => 'Item 5'));
	}

	public function test_update_using_MongoId() {
		$this->subject->insert('user', array('name' => 'Lorem Ipsum'));
		$user = $this->subject->findOne('user');

		$this->subject->update('user', array('name' => 'Lorem Ipsum'), array('name' => 'New Name'));
		$result = $this->subject->findOne('user');
		$this->assertEquals('New Name', $result['name']);

		$this->subject->update('user', $user['_id'], array('name' => 'New Name'));
		$result = $this->subject->findOne('user');
		$this->assertEquals('New Name', $result['name']);

		$this->subject->update('user', $user['_id']->{'$id'}, array('name' => 'Another Name'));
		$result = $this->subject->findOne('user');
		$this->assertEquals('Another Name', $result['name']);
	}

	public function test_remove() {
		$this->subject->insert('user', array('name' => 'Lorem Ipsum'));
		$this->subject->remove('user', array('name' => 'Lorem Ipsum'));
		$this->assertNull($this->subject->findOne('user', array('name' => 'Lorem Ipsum')));

		$this->subject->insert('user', array('name' => 'Lorem Ipsum'));
		$user = $this->subject->findOne('user');
		$this->subject->remove('user', $user['_id']);
		$this->assertNull($this->subject->findOne('user', array('name' => 'Lorem Ipsum')));

		$this->subject->insert('user', array('name' => 'Lorem Ipsum'));
		$user = $this->subject->findOne('user');
		$this->subject->remove('user', $user['_id']->{'$id'});
		$this->assertNull($this->subject->findOne('user', array('name' => 'Lorem Ipsum')));
	}
}