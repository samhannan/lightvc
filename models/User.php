<?php

class User Extends Model {
	protected $table = 'user';
	protected $identity = 'id';
	protected $cols = array('parent_id', 'tree_level', 'sort_order', 'role_type', 'user_id', 'role_name');
	
	public function prepare_add_user() {
		return self::$pdo->prepare('INSERT INTO '.$this->table.' (email, name, datetime) VALUES (:email, :name, :datetime)');
	}
	
	public function prepare_update_user() {
		return self::$pdo->pdo->prepare('UPDATE user SET email = :email, name = :name WHERE '.$this->identity.' = :id');
	}

}
	

?>