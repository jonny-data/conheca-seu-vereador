<?php 

namespace Engine;

class Alderman {
	public $url = null;
	public $name = null;
	public $politicalParty = null;
	public $biography = null;
	public $phone = null;
	public $fax = null;
	public $email = null;
	public $addressCorrespondence = null;
	public $avatar = null;

	public function parse($url, $html) {
		libxml_use_internal_errors(true);

		$document = new AldermanDocument($url, $html);

		$this->url = $url;
		$this->name = $document->name();
		$this->politicalParty = $document->politicalParty();
		$this->biography = $document->biography();
		$this->phone = $document->phone();
		$this->fax = $document->fax();
		$this->email = $document->email();
		$this->addressCorrespondence = $document->addressCorrespondence();
		$this->avatar = $document->avatar();
	}

	protected function url($url) {
		return $url;
	}

	public function toJSON() {
		return array(
			'profile' => array(
				'personal' => array(
					'name' => $this->name,
					'email' => $this->email,
					'biography' => $this->biography,
					'avatar' => $this->avatar,
					'phone' => $this->phone,
					'fax' => $this->fax,
					'address_correspondence' => $this->addressCorrespondence

				),
				'political' => array(
					'type' => 'alderman',
					'political_party' => $this->politicalParty
				)
			)
		);
	}
}