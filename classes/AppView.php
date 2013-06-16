<?php

class AppView extends Lvc_View
{
	public function requireCss($cssFile)
	{
		$this->controller->requireCss($cssFile);
	}
	
	public function requireJsBody($jsFile)
	{
		$this->controller->requireJs($jsFile);
	}
	
	public function requireJsHead($jsFile)
	{
		$this->controller->requireJsHead($jsFile);
	}
}

?>