<?php

class Database
{
	public static $instance;
	public $pdo;
	
	private function __construct() {
		$this->pdo = $this->PDOconnect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	}
	
    public static function getInstance() {
        if (!Database::$instance instanceof self) {
			Database::$instance = new self;
        }
        return Database::$instance;
    }
	
	private function PDOconnect($host, $user, $pass, $name) {
		try {
			$pdo =  new PDO("mysql:host=$host;dbname=$name", $user, $pass);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			return $pdo;
		} catch(PDOException $e) {  
			die($e->getMessage());  
		}
	}
}