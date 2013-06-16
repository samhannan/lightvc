<?php

class AppController extends Lvc_PageController
{

	protected function beforeAction() {	
	}
		
	protected function throwError($code='404', $error='')
	{
		error_log($error);
		$statusCode = $this->sendHttpStatusHeader($code);
		$this->setLayoutVar('pageTitle', $statusCode->getDefinition());
		$this->loadView('error/' . $code);
		exit;
	}
	
	public function sendHttpStatusHeader($code)
	{
		include_once('HttpStatusCode.php');
		$statusCode = new HttpStatusCode($code);
		header('HTTP 1.1 ' . $statusCode->getCode() . ' ' . $statusCode->getDefinition());
		return $statusCode;
	}
	
	public function redirectToAction($actionName)
	{
		$this->redirect(WWW_BASE_PATH . $this->getControllerPath() . '/' . $actionName);
	}
	
}

?>