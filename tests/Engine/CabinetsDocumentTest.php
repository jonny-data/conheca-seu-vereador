<?php 

namespace Engine;

/**
* 
*/
class CabinetsDocumentTest extends \PHPUnit_Framework_TestCase {
	public $subject;

	public function setUp() {
		$html = file_get_contents(dirname(dirname(__FILE__)) . '/files/Engine/Cabinets/test1.html');
		$this->subject = new CabinetsDocument($html);
	}

	public function tearDown() {
		unset($this->subject);
	}

	public function testCabinets() {
		$result = $this->subject->cabinets();
		$this->assertCount(54, $result);
		$this->assertEquals('Abou Anni - PV', $result[0]['name']);
		$this->assertEquals('4º andar', $result[0]['floor']);
		$this->assertEquals('406', $result[0]['room']);
		$this->assertEquals('4513 - 4525 - 4624 - 4625 - 4869 - 4870', $result[0]['branch']);
	}
}