<?php 
namespace Pusaka\RestServer;

class RestRequestFilter {

	private $filters;

	public function addFilter($key, $value) {
		$this->filters[$key] = $value;
	}

	public function setFilter(array $filters = array()) {
		$this->filters = $filters;
	}

	public function getFilter($key) {
		return $this->filters[$key];
	}

	public function match($value) {
		return array_key_exists($value, $this->filters);
	}

}