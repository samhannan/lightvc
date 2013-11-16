<?php

class BEController extends FrontController {
	protected $loggedIn = false;
	
	public function __construct($checkLoggedIn=true) {
		if(!$this->checkLoggedIn() && $checkLoggedIn) {
			$this->redirect('/admin/login');
		}
	}
	
	public function checkLoggedIn() {
		return false;
	}
	
}

?>