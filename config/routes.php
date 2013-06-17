<?php

$regexRoutes = array();

// Define static pages here
$staticPages = array(
	'contact-us'
);

// Add static pages to routes
foreach($staticPages as $page) {
	$regexRoutes['#^'.$page.'/?(.*)$#'] = array(
		'controller' => 'page',
		'action' => 'view',
		'action_params' => array('page_name' => $page,),
	);
}

// Map nothing to the home page.
$regexRoutes['#^$#'] = array(
	'controller' => 'page',
	'action' => 'view',
	'action_params' => array(
		'page_name' => 'home',
	)
);

// Map nothing to the home page.
$regexRoutes['#^([^/]+)/([^/]+)/?(.*)$#'] = array(
	'controller' => 1,
	'action' => 2,
	'additional_params' => 3,
);

// Map nothing to the home page.
$regexRoutes['#^([^/]+)/?$#'] = array(
	'controller' => 1,
		'action' => 'index',
);


?>