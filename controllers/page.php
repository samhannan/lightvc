<?php

/*
* Auto loads view from specified param name
* See /config/routes.php
*/

class PageController extends FrontController
{
	public function actionView($pageName = 'home')
	{
		if (strpos($pageName, '../') !== false)
		{
			throw new Lvc_Exception('File Not Found: ' . $sourceFile);
		}
		
		$this->loadView('page/' . rtrim($pageName, '/'));
	}

}

?>