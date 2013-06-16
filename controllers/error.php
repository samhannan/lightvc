<?php

class ErrorController extends FrontController
{
	public function actionView($errorNum = '404')
	{	
		if (is_array($errorNum))
		{
			$errorNum = $errorNum['error'];
		}
		else
		{
			if (strpos($errorNum, '../') !== false)
			{
				$errorNum = '404';
			}
		}
		include_once('../classes/HttpStatusCode.php');
		$statusCode = new HttpStatusCode($errorNum);
		$this->setLayoutVar('pageTitle', $statusCode->getDefinition());
		$this->loadView($this->getControllerName() . '/' . $statusCode->getCode());
	}

}

?>