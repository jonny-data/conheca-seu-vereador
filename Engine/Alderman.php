<?php 

namespace Engine;

class Alderman {
	public $name = null;
	public $politicalParty = null;
	public $biography = null;
	public $phone = null;
	public $fax = null;
	public $email = null;
	public $addressCorrespondence = null;
	public $avatar = null;

	public function parse($html) {
		libxml_use_internal_errors(true);

		$document = new AldermanDocument($html);

		$this->name = $document->name();
		$this->politicalParty = $document->politicalParty();
		$this->biography = $document->biography();
		$this->phone = $document->phone();
		$this->fax = $document->fax();
		$this->email = $document->email();
		$this->addressCorrespondence = $document->addressCorrespondence();
		$this->avatar = $document->avatar();
	}
}