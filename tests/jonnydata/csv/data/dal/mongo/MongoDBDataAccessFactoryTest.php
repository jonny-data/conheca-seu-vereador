<?php 

namespace jonnydata\csv\data\dal\mongo;

class MongoDBDataAccessFactoryTest extends \PHPUnit_Framework_TestCase {
	public $subject = null;

	public function setUp() {
		$this->subject = new MongoDBDataAccessFactory();
	}

	public function tearDown() {
		unset($this->subject);
	}

	public function test_createBillDataAccess() {
		$this->assertInstanceOf('jonnydata\csv\data\dal\mongo\MongoDBBillDataAccess', $this->subject->createBillDataAccess());
	}

	public function test_createElectoralCoalitionDataAccess() {
		$this->assertInstanceOf('jonnydata\csv\data\dal\mongo\MongoDBElectoralCoalitionDataAccess', $this->subject->createElectoralCoalitionDataAccess());
	}

	public function test_createPoliticalOrganizationDataAccess() {
		$this->assertInstanceOf('jonnydata\csv\data\dal\mongo\MongoDBPoliticalOrganizationDataAccess', $this->subject->createPoliticalOrganizationDataAccess());
	}

	public function test_createPoliticianDataAccess() {
		$this->assertInstanceOf('jonnydata\csv\data\dal\mongo\MongoDBPoliticianDataAccess', $this->subject->createPoliticianDataAccess());
	}

	public function test_createSessionDataAccess() {
		$this->assertInstanceOf('jonnydata\csv\data\dal\mongo\MongoDBSessionDataAccess', $this->subject->createSessionDataAccess());
	}
}