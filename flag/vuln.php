<?php
class AnyClass {
	public $data = null;
	public function __construct($data) {
		$this->data = $data;
	}
	
	function __destruct() {
		system($this->data);
	}
}

filesize("phar://test.phar"); #The attacker can control this path