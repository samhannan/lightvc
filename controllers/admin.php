<?php

class AdminController extends BEController {

	public function __construct() {
		$checkLogin = ($_SERVER['REQUEST_URI'] == '/admin/login') ? false : true;
		parent::__construct($checkLogin);
	}
	
	public function actionIndex()
	{
		$this->loadView('page/about');
	}
	
	public function actionLogin()
	{
	}
	
}

?>