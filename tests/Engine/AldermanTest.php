<?php 

namespace Engine;

class AldermanTest extends \PHPUnit_Framework_TestCase {
	public $subject = null;

	public function setUp() {
		$html = file_get_contents(dirname(dirname(__FILE__)) . '/files/Engine/Alderman/test1.html');
		$this->subject = new Alderman();
		$this->subject->parse('http://www1.camara.sp.gov.br/vereador_joomla2.asp?vereador=78', $html);
	}

	public function tearDown() {
		unset($this->subject);
	}

	public function test_toJSON() {
		$result = $this->subject->toJSON();
		$expected = json_decode(file_get_contents(dirname(dirname(__FILE__)) . '/files/Engine/Alderman/test1.json'), true);
		$this->assertEquals($expected, $result);
	}
}