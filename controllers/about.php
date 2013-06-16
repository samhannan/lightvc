<?php

class AboutController extends FrontController
{

	public function actionIndex()
	{
		
		/*
		$user = Model::factory('User');
		
		// PDO insert
		$q = $user->prepare_add_user();
		
		$data = array(
			'email' => 'test@test.com',
			'name' => 'sam',
			'datetime' => getdate()
		);
		$date = getDate();
		
		$q->bindParam(':name', $data['name']);
		$q->bindParam(':email', $data['email']);
		$q->bindParam(':datetime', $date);
		
		$q->execute();
			
		
		// PDO update
		$q = $user->prepare_update_user();
		
		$name = 'sam2';
		$email = 'test@test.com';
		$id = 1;
				
		$q->bindParam(':name', $name);
		$q->bindParam(':email', $email);
		$q->bindParam(':id', $id);
		
		$q->execute();
		*/
		
		
		
		/* 
		can also pass in assoc array
		$q->execute($data);
		*/
		

		$this->loadView('page/about');
	}
	
}

?>