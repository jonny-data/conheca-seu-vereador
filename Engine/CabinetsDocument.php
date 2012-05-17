<?php 

namespace Engine;

class CabinetsDocument {
	protected $document;
	protected $path;

	public function __construct($html) {
		libxml_use_internal_errors(true);
		$this->document = \DomDocument::loadHTML($html);
		$this->path = new \DOMXPath($this->document);
	}

	public function cabinets() {
		$result = array();
		foreach ($this->cabinetsNodes() as $node) {
			$result[] = $this->cabinet($node);
		}
		return $result;
	}

	protected function cabinetsNodes() {
		return $this->path->query('.//tbody/tr[position()>2]', $this->tableNode());
	}

	protected function tableNode() {
		return $this->path->query('//div[@class="cmsp_titulo_pagina"]/following-sibling::table[2]')->item(0);
	}

	protected function cabinet($node) {
		$nodes = $this->path->query('./td', $node);
		return array(
			'name' => $this->cabinetName($nodes),
			'floor' => $this->cabinetFloor($nodes),
			'room' => $this->cabinetRoom($nodes),
			'branch' => $this->cabinetBranch($nodes)
		);
	}

	protected function cabinetName($nodes) {
		return $nodes->item(0)->textContent;
	}

	protected function cabinetFloor($nodes) {
		return $nodes->item(1)->textContent;
	}

	protected function cabinetRoom($nodes) {
		return $nodes->item(2)->textContent;
	}

	protected function cabinetBranch($nodes) {
		if ($nodes->length < 4) {
			return '';
		}
		return $nodes->item(3)->textContent;
	}
}