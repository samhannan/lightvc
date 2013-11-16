<?php

class AboutController extends FrontController
{
	public function actionIndex()
	{
		$user = Model::factory('User');
		$user->add_user(array('email' => 'sam@test.com', 'name' => 'Sam'));
		
		$this->loadView('page/about');
	}
	
}

?>