<?php

class Model extends Database {
	protected $db;
	
	public function __construct() {
		$this->db = parent::getInstance()->pdo;
	}
	
	public static function factory($name) {
		return new $name;
	}
}

?>
