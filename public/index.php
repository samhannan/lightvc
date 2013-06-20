<?php

// Load core application config
include_once('../config/application.php');

try
{
	// Process the HTTP request using only the routers we need for this application.
	$fc = new Lvc_FrontController();
	$fc->addRouter(new Lvc_RegexRewriteRouter($regexRoutes));
	$fc->processRequest(new Lvc_HttpRequest());
}
catch (Lvc_Exception $e)
{
	try
	{
		// Load static page if available
		$fc = new Lvc_FrontController();
		$fc->addRouter(new Lvc_RegexRewriteRouter($staticRoute));
		$fc->processRequest(new Lvc_HttpRequest());
	} 
	catch(Lvc_Exception $e)
	{
		// Controller and static page do not exist - force 404
		$request = new Lvc_Request();
		$request->setControllerName('error');
		$request->setActionName('view');
		$request->setActionParams(array('error' => '404'));

		$fc = new Lvc_FrontController();
		$fc->processRequest($request);
	}
	catch (Exception $e)
	{
		// Log error
		error_log($e->getMessage());
	}
}
catch (Exception $e)
{
	// Log error
	error_log($e->getMessage());
}

?>