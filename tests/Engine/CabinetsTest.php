<?php 

namespace Engine;

class CabinetsTest extends \PHPUnit_Framework_TestCase {
	public $subject;

	public function setUp() {
		$html = file_get_contents(dirname(dirname(__FILE__)) . '/files/Engine/Cabinets/test1.html');
		$this->subject = new Cabinets($html);
		$this->subject->parse($html);
	}

	public function tearDown() {
		unset($this->subject);
	}

	public function test_toJSON() {
		$expected = json_decode(file_get_contents(dirname(dirname(__FILE__)) . '/files/Engine/Cabinets/test1.json'), true);
		$this->assertEquals($expected, $this->subject->toJSON());
	}
}