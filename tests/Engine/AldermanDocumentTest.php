<?php 

namespace Engine;

class AldermanDocumentTest extends \PHPUnit_Framework_TestCase {
	public $subject = null;

	public function setUp() {
		$html = file_get_contents(dirname(dirname(__FILE__)) . '/files/Engine/Alderman/test1.html');
		$this->subject = new AldermanDocument('http://www1.camara.sp.gov.br/vereador_joomla2.asp?vereador=78', $html);
		$this->expected = json_decode(file_get_contents(dirname(dirname(__FILE__)) . '/files/Engine/Alderman/test1.json'));
	}

	public function test_name() {
		$this->assertEquals($this->expected->profile->personal->name, $this->subject->name());
	}

	public function test_politicalParty() {
		$this->assertEquals($this->expected->profile->political->political_party, $this->subject->politicalParty());
	}

	public function test_biography() {
		$this->assertEquals($this->expected->profile->personal->biography, $this->subject->biography());
	}

	public function test_phone() {
		$this->assertEquals($this->expected->profile->personal->phone, $this->subject->phone());
	}

	public function test_fax() {
		$this->assertEquals($this->expected->profile->personal->fax, $this->subject->fax());
	}

	public function test_email() {
		$this->assertEquals($this->expected->profile->personal->email, $this->subject->email());
	}

	public function test_addressCorrespondence() {
		$this->assertEquals($this->expected->profile->personal->address_correspondence, $this->subject->addressCorrespondence());
	}

	public function test_avatar() {
		$this->assertEquals($this->expected->profile->personal->avatar, $this->subject->avatar());
	}
}