<?php

class User Extends Model {
	public $table = 'user';
	public $identity = 'id';
	
	public function add_user($v) {
		$pdo = $this->db->prepare('INSERT INTO '.$this->table.' (email, name) VALUES (:email, :name)');
		return $pdo->execute($v);
	}
	
}
	

?>