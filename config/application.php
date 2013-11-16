<?php

// Base paths
define('APP_PATH', dirname(dirname(__FILE__)) . '/');
define('BASE_PATH', str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));

// Include and configure the LighVC framework (http://lightvc.org/)
include_once(APP_PATH . 'modules/lightvc/lightvc.php');
Lvc_Config::addControllerPath(APP_PATH . 'controllers/');
Lvc_Config::addControllerViewPath(APP_PATH . 'views/');
Lvc_Config::addLayoutViewPath(APP_PATH . 'views/layouts/');
Lvc_Config::addElementViewPath(APP_PATH . 'views/elements/');
Lvc_Config::setViewClassName('AppView');
Lvc_Config::setLayoutContentVarName('bodyContent');
Lvc_Config::setDefaultControllerActionName('index');
include(APP_PATH . 'classes/AppController.php');
include(APP_PATH . 'classes/AppView.php');
include(dirname(__FILE__) . '/routes.php');

// Local config
include_once(APP_PATH . 'config/local.php');

// Autoloader (http://anthonybush.com/projects/autoloader/)
include(APP_PATH . 'classes/Autoloader.php');
//Autoloader::setCacheFilePath(APP_PATH . 'cache/autoloader_cache.txt');
Autoloader::excludeFolderNamesMatchingRegex('/^CVS|\..*$/');
Autoloader::setClassFileSuffix('.php');
Autoloader::setClassPaths(array(
	APP_PATH . 'classes/',
	APP_PATH . 'models/',
	APP_PATH . 'libraries/'
));
if(MODE == 'TEST') Autoloader::setCacheEnable(false);
spl_autoload_register(array('Autoloader', 'loadClass'));

// Errors
ini_set('show_errors', true);
error_reporting(E_ALL);


/*
Setup SimpleReflector alias (http://anthonybush.com/projects/simplereflector/)
call this to debug a variable/object, e.g. jam($var);
*/
//function jam() { call_user_func_array(array('SimpleReflector', 'jam'), func_get_args()); }



?>