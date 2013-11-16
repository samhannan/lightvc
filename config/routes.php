<?php

// Controller routes
$regexRoutes = array(

	// Map nothing to the home page.
	'#^$#' => array(
		'controller' => 'page',
		'action' => 'view',
		'action_params' => array(
			'page_name' => 'home'
		)
	),

	// Controller/method/args
	'#^([^/]+)/([^/]+)/?(.*)$#' => array(
		'controller' => 1,
		'action' => 2,
		'additional_params' => 3
	),

	// Controller/index (default controller action)
	'#^([^/]+)/?$#' => array(
		'controller' => 1,
		'action' => 'index'
	),

	
);

// Used for finding static page if controller not available
$staticRoute = array(
	'#^(.*)$#' => array(
		'controller' => 'page',
		'action' => 'view',
		'action_params' => array('page_name' => 1)
	)
);


?>