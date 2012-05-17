<?php 

namespace Engine;

class AldermanDocument {
	protected $url;
	protected $document;
	protected $path;

	public function __construct($url, $html) {
		$this->url = $url;
		libxml_use_internal_errors(true);
		$this->document = \DomDocument::loadHTML($html);
		$this->path = new \DOMXPath($this->document);
	}

	public function name() {
		return $this->text($this->nameNode());
	}

	public function politicalParty() {
		return $this->text($this->politicalPartyNode());
	}

	public function biography() {
		return $this->textBlock($this->biographyNodes());
	}

	public function phone() {
		return $this->text($this->contactAttributeNode('Telefone:'));
	}

	public function fax() {
		return $this->text($this->contactAttributeNode('Fax:'));
	}

	public function email() {
		return $this->text($this->emailNode());
	}

	public function addressCorrespondence() {
		return $this->textBlock($this->addressCorrespondenceNodes());
	}

	public function avatar() {
		return $this->url($this->avatarNode()->getAttribute('src'));
	}

	protected function nameNode() {
		return $this->document->getElementById('nome_vereador');
	}

	protected function politicalPartyNode() {
		return $this->path->query('../following-sibling::font', $this->nameNode())->item(0);
	}

	protected function biographyNodes() {
		return $this->path->query('//p[@class="biografia_vereador_titulo"]/following-sibling::p');
	}

	protected function emailNode() {
		return $this->contactAttributeNode('E-mail:', 'a');
	}

	protected function contactAttributeNode($label, $child = 'text()') {
		$expression = './/b[contains(., "' . $label . '")]/following-sibling::' . $child . '[1]';
		return $this->firstNode($expression, $this->contactNode());
	}

	protected function addressCorrespondenceNodes() {
		$label = utf8_encode('Endereço para correspondência:');
		$expression = './/b[contains(., "' . $label . '")]/following-sibling::text()';
		return $this->path->query($expression, $this->contactNode());
	}

	protected function contactNode() {
		return $this->document->getElementById('FaleVereador');
	}

	protected function avatarNode() {
		return $this->firstNode('//td/comment()[contains(., "FOTO DO VEREADOR")]/preceding-sibling::img');
	}

	public function firstNode($expression, $context = null) {
		$nodes = $this->path->query($expression, $context);
		if ($nodes->length) {
			return $nodes->item(0);
		}
		return new \DOMNode();
	}

	protected function text($node) {
		return trim(utf8_decode($node->textContent));
	}

	protected function textBlock($nodes) {
		$result = array();
		foreach ($nodes as $node) {
			$content = $this->text($node);
			if ($content === '') {
				continue;
			}
			$result[] = $content;
		}
		return implode("\n", $result);
	}

	protected function url($url) {
		if ($url[0] !== '/') {
			return dirname($this->url) . '/' . $url;
		}
		return $url;
	}
}