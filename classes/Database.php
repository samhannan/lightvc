<?php

class Database
{
	protected static $pdo = false;
	private $query = '';
	private $action = 'select';
	private $update_data = '';
	
	
	public function __construct() {
		if(!self::$pdo) {
			self::$pdo = $this->getInstance();
		}
	}
	
	// Create PDO object
	public static function getInstance() {
		try {
			$pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS, array(
				PDO::ATTR_PERSISTENT => PDO_PERSISTANT
			));			
			$pdo->setAttribute(PDO::ATTR_ERRMODE, MODE == 'TEST' ? PDO::ERRMODE_WARNING : PDO::ERRMODE_EXCEPTION);
		
		} catch(PDOException $e) {
			die('Unable to establish a connection');
			//$this->throwError(500, $e->getMessage());
		}
		return $pdo;
	}
	
	/*
	Testing shit
	
	public function execute($arr=null) {
		if($this->action == 'insert') {
			$vals = array_values($arr);		
			return $this->query->execute(array('fgfg'));
		}
		if($this->action == 'update') {
			$arr = $this->update_data;		
			return $this->query->execute($arr);
		}
		//return $this->query->execute();
	}
	
	public function prepare_insert($arr) {
		$this->action = 'insert';
		$keys = implode(',', $this->cols);
		$vals = implode(', :', $this->cols);
		$q = $this->pdo->prepare('INSERT INTO '.$this->table.' ('.$keys.') VALUES (:'.$vals.')');
		$this->query = $q;
		
		return $q;
	}
	
	public function prepare_update($arr, $arrWhere) {
		$this->action = 'update';
		foreach(array_keys($arr) as $k => $v) {
			if(!in_array($v, $this->cols)) {
				unset($arr[$k]);
			}
		}
		$setStr = '';
		foreach($arr as $k => $v) {
			$setStr .= $k.' = :' .$v. ', ';
		}
		$setStr = rtrim($setStr, ',');
		
		$whereStr = '';
		foreach($arrWhere as $k => $v) {
			$whereStr .= $k.' = '.$this->pdo->quote($v).' AND ';
		}
		$whereStr = rtrim($setStr, 'AND');
		
		$q = $this->pdo->prepare('UPDATE '.$this->table.' SET ('.$setStr.') WHERE '.$whereStr);
		$this->query = $q;
		$this->update_data = $arr;
		
		return $q;
	}
	*/
	
	
	
}