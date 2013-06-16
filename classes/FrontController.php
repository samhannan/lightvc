<?php

class FrontController extends AppController {

	protected $layout = 'default';
	
	protected function beforeAction()
	{
		$this->setLayoutVar('pageTitle', SITE_NAME);
		$this->requireCss('style.css');
		parent::beforeAction();
	}
	
	public function requireCss($cssFile)
	{
		$this->layoutVars['requiredCss'][$cssFile] = true;
	}
	
	public function requireJsBody($jsFile)
	{
		$this->layoutVars['requiredJsBody'][$jsFile] = true;
	}
	
	public function requireJsHead($jsFile)
	{
		$this->layoutVars['requiredJsHead'][$jsFile] = true;
	}

}

?>